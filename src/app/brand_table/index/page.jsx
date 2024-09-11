'use client';
import Link from 'next/link';
import React, { useEffect, useState } from 'react'
import Swal from 'sweetalert2';

export default function Brand() {

    const [brandData, setBrandData] = useState([]);
    console.log(brandData)
    useEffect(() => {
        fetchBrand();
    }, []);
 
    const fetchBrand = async () => {
            try {
                const response = await fetch(`http://localhost:8000/api/brands`);
                const data = await response.json();
                console.log(data);
                if (response.ok) {
                    setBrandData(data.brands);
                    console.log(data.brands);
                }
            console.log(response.brands);
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    text: error,
                });
            }
    }

  return (
    <div>
        <div>  
            <a href="/admin">home</a>
        </div>
      <table className="table table-zebra">
        <thead className="text-sm text-white uppercase">
            <tr>
                <th className="py-3 px-6">id</th>
                <th className="py-3 px-6 w-[10rem]">brand name</th>
                <th className="py-3 px-6">brand image</th>
                <th className="py-3 px-6">brand location</th>
                <th className="py-3 px-6">founded year</th>
                <th className="py-3 px-6">create at</th>
                <th className="py-3 px-6">action</th>
            </tr>
        </thead>
        <tbody>
            {brandData.map((brand,index) => (
            <tr key={brand.id}>
                <td className="py-3 px-6">{brand.id}</td>
                <td className="py-3 px-6 w-[12rem] text-center">{brand.b_name}</td>
                <td className="py-3 px-6"><img className='w-1/4 h-1/4 mx-auto' src={brand.b_img} alt="" /></td>
                <td className="py-3 px-6">{brand.b_location}</td>
                <td className="py-3 px-6">{brand.founded_year}</td>
                <td className="py-3 px-6">
                    <Link href="/brand_table/create"className="btn btn-primary">Create</Link>
                </td>
                <td className="flex justify-center gap-1 py-3">
                    <Link
                    href={`/brand_table/edit/${brand.id}`} 
                    className="btn btn-primary">
                    Edit
                    </Link>
                    <button onClick={()=>handleDelete(brand.id)} className="btn btn-secondary">Delete</button>
                </td>
            </tr>
            ))}
        </tbody>
      </table>
    </div>
  )
}
