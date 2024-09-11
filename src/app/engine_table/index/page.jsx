'use client';
import Link from 'next/link';
import React, { useEffect, useState } from 'react'
import Swal from 'sweetalert2';

export default function Engine() {

    const [engineData, setEngineData] = useState([]);
    console.log(engineData);
    useEffect(() => {
        fetchEngine();
    }, [])
 
    const fetchEngine = async () => {
            try {
                const response = await fetch(`http://localhost:8000/api/engines`);
                const data = await response.json();
                console.log(data);
                if (response.ok) {
                    setEngineData(data.engines);
                    console.log(data.engines);
                }
                console.log(response.engines);
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
      <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Engine type</th>
                <th>Engine detail</th>
                <th>Engine HP</th>
                <th>Engine image</th>
                <th>create at</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            {engineData.map((engine,index) => (
            <tr key={engine.id} className=" border-b">
                <td>{engine.id}</td>
                <td>{engine.e_type}</td>
                <td>{engine.e_detail}</td>
                <td>{engine.e_hp}</td>
                <td><img src={engine.e_img} alt="" /></td>
                <td>
                    <Link href="/engine_table/create"className="btn btn-primary">Create</Link>
                </td>
                <td className="flex justify-center gap-1 py-3">
                    <Link
                    href={`/engine_table/edit/${engine.id}`} 
                    className="btn btn-primary">
                    Edit
                    </Link>
                    <button onClick={()=>handleDelete(engine.id)} className="btn btn-secondary">Delete</button>
                </td>
            </tr>
            ))}
        </tbody>
      </table>
    </div>
  )
}
