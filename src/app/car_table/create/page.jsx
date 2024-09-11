'use client';
import { useRouter } from 'next/navigation';
import React, { useState } from 'react'
import Swal from 'sweetalert2';


export default function CreateCarPage () {
    const [carField, setCarField] = useState({
        c_name: '',
        c_img: '',
        c_detail: '',
        c_engine_id: '',
        c_brand_id: '',
    });

    const [error, setError] = useState([]);
    const router = useRouter();
    
    const changeCarFieldHandler = (e) => {
        setCarField({
            ...carField,
            [e.target.name]: e.target.value
        });
    }
    console.log(carField.c_name)
    console.log(carField.c_img)
    console.log(carField.c_detail)
    console.log(carField.c_engine_id)
    console.log(carField.c_brand_id)
    const onSubmitChange = async (e) => {
        e.preventDefault();
        try {
            const response = await fetch(`http://localhost:8000/api/cars`,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // เพิ่ม Content-Type header เพื่อบอกว่าเราส่งข้อมูลในรูปแบบ JSON
                },
                body: JSON.stringify(carField), // แปลงข้อมูล roleField ให้เป็น JSON
            });
            const data = await response.json(); 
          if (response.ok) {
            Swal.fire({
                icon: "succes",
                text: data.message, 
            });
            router.push('/car_table/index')
          } else if (data.stetus === 422) {
            setError(data.errors);
            console.log(data.errors)
          }
        } catch (error) {
            Swal.fire({
                icon: "error",
                text: "Something Wrong!" 
            });
        }
    }
   
  return (
    <div>
       <div className="max-w-md mx-auto mt-5">
        <h1 className="text-2xl text-center mb-2">Add New Car</h1>
        <div>
        <form>
        <div className="mb-5">
          <label htmlFor="c_name" className="block text-sm font-medium text-white">
            Car Name
          </label>
          <input
            type="text"
            name="c_name"
            id="c_name"
            className="input input-bordered input-primary w-full max-w-xs text-black p-2"
            placeholder="Car Name..."
            onChange={e => changeCarFieldHandler(e)}
          />
        </div>
        <div className="mb-5">
          <label htmlFor="c_img" className="block text-sm font-medium text-white">
            Car Image
          </label>
          <input
            type="text"
            name="c_img"
            id="c_img"
            className="input input-bordered input-primary w-full max-w- text-black p-2"
            placeholder="Car Image"
            onChange={e => changeCarFieldHandler(e)}
          />
        </div>
        <div className="mb-5">
          <label htmlFor="c_detail" className="block text-sm font-medium text-white">
            Car detail
          </label>
          <input
            type="text"
            name="c_detail"
            id="c_detail"
            className="input input-bordered input-primary w-full max-w-xs text-black p-2"
            placeholder="Car detail"
            onChange={e => changeCarFieldHandler(e)}
          />
        </div>
        <div className="mb-5">
          <label htmlFor="c_engine_id" className="block text-sm font-medium text-white">
            Car Engine Id
          </label>
          <input
            type="number"
            name="c_engine_id"
            id="c_engine_id"
            className="input input-bordered input-primary w-full max-w-xs text-black p-2"
            placeholder="Car Engine"
            onChange={e => changeCarFieldHandler(e)}
          />
        </div>
        <div className="mb-5">
          <label htmlFor="c_brand_id" className="block text-sm font-medium text-white">
            Car Brand Id
          </label>
          <input
            type="number"
            name="c_brand_id"
            id="c_brand_id"
            className="input input-bordered input-primary w-full max-w-xs text-black p-2"
            placeholder="Car Brand"
            onChange={e => changeCarFieldHandler(e)}
          />
        </div>
        <button type="submit" className="btn btn-primary" onClick={e => onSubmitChange(e)}>Add Car</button> 
      </form>
    </div>
    </div>
    </div>
  );
};


