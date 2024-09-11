'use client';
import Link from "next/link";
import { useEffect, useState } from "react";
import Swal from "sweetalert2";
import { FcCamera } from "react-icons/fc";
import { PiTrashThin } from "react-icons/pi";

export default function Car() {
    
    const [carData, setCarData] = useState([]);
    console.log(carData)
    useEffect(() => {
        fetchCar(); 
    }, []);

    const fetchCar = async () => {
        try {
            const response = await fetch(`http://localhost:8000/api/cars`);
            const data = await response.json();
            console.log(data);
            if (response.ok) {
                setCarData(data.cars);
                console.log(data.cars);
            } 
        console.log(response.cars);    
        } catch (error) {
            Swal.fire({
                icon: "error",
                text: error,
            });
        }
    }

    const [deleting, setDeleting] = useState(null);
    const handleDelete = async (e, id) => {
        e.preventDefault();
        setDeleting(id);
    
        try {
          const response = await fetch(`http://localhost:8000/api/cars/`+id, {
            method: 'DELETE',
          });
    
          const data = await response.json();
    
          if (response.ok) {
            Swal.fire({
              icon: "success",
              text: data.message,
              color: "white",
              confirmButtonText: "ตกลง",
              confirmButtonColor: "#005e95",
              background: "rgba(0,0,0,0) linear-gradient(rgba(0, 54, 104, 0.5), rgba(0, 94, 149, 0.5)) repeat scroll 0 0",
            });
            setCarData(prev => prev.filter(car => car.id !== id));
            setDeleting(null);
          } else if (data.status === 400) {
            Swal.fire({
              icon: "warning",
              text: data.message,
              color: "white",
              confirmButtonText: "ตกลง",
              confirmButtonColor: "#005e95",
              background: "rgba(0,0,0,0) linear-gradient(rgba(0, 54, 104, 0.5), rgba(0, 94, 149, 0.5)) repeat scroll 0 0",
            });
            setDeleting(null);
          }
        } catch (error) {
          Swal.fire({
            icon: "error",
            text: "มีข้อผิดพลาดกับดึงข้อมูล",
            color: "white",
            confirmButtonText: "ตกลง",
            confirmButtonColor: "#005e95",
            background: "rgba(0,0,0,0) linear-gradient(rgba(0, 54, 104, 0.5), rgba(0, 94, 149, 0.5)) repeat scroll 0 0",
          });
        }
      }

  return (
    <div>
         <div>  
            <a href="/admin">home</a>
        </div>
        <Link
                     href="/car_table/create"
                     className="btn btn-primary">
                     Create
                    </Link>
      <table className="table table-zebra">
        <thead className="text-sm text-white uppercase">
            <tr>
            <th className="py-3 px-6">id</th>
            <th className="py-3 px-6">Name</th>
            <th className="py-3 px-6 text-left">image</th>
            <th className="py-3 px-6">detail</th>
            <th className="py-3 px-6">engin id</th>
            <th className="py-3 px-6">brand id</th>
            <th className="py-3 px-6">brand name</th>
            <th className="py-3 px-6">engine type</th>
            <th className="py-3 px-6 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            {carData.map((car, index) => (
            <tr key={car.id} className=" border-b">
                <td className="py-3 px-6">{car.id}</td>
                <td className="py-3 px-6">{car.c_name}</td>
                <td className="py-3 px-6"><img className="w-1/2 h-1/3 mx-auto" src={car.c_img} alt="" /></td>
                <td className="py-3 px-6">{car.c_detail}</td>
                <td className="py-3 px-6">{car.c_engine_id}</td>
                <td className="py-3 px-6">{car.c_brand_id}</td>
                <td className="py-3 px-6">{car.brand.b_name}</td>
                <td className="py-3 px-6">{car.engine.e_type}</td>
                <td className="flex justify-center gap-1 py-3">
                    <Link
                    href={`/car_table/edit/${car.id}`} 
                    className="btn btn-primary">
                    Edit
                    </Link>
                    <button onClick={(e) => handleDelete( e, car.id )} >
                    {deleting === car.id ? "กำลังลบ..." : <PiTrashThin size={25} />}
                    </button>
                </td>
            </tr>
            ))}
        </tbody>
        </table>
    </div>
  )
}
