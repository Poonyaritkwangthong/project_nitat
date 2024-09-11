import React from 'react'

export default function Appbar() {
  return (
    <div>
        <div className="flex justify-between p-2">
            <div className='text-3xl'>
                <ul className='flex gap-4 ml-2 mt-1'>
                    <a className='shadow-lg hover:shadow-indigo-500/40 font-semibold transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300' href="/">HOME</a>
                    <a className='shadow-lg hover:shadow-indigo-500/40 font-semibold transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300' href="/about">ABOUT</a>
                    <a className='shadow-lg hover:shadow-indigo-500/40 font-semibold transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300' href="">CAR</a>
                    <a className='shadow-lg hover:shadow-indigo-500/40 font-semibold transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300' href="/admin">ADMIN</a>
                </ul>
            </div>
            <div className='text-xl my-auto'>
                <ul className="flex justify-screen gap-6 mr-2">
                    <a className='shadow-lg hover:shadow-indigo-500/40 bg-white text-black p-2 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300' href="">LOGIN</a>
                    <a className='shadow-lg hover:shadow-indigo-500/40 bg-white text-black p-2 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300' href="">LOGOUT</a>
                </ul>
            </div>
        </div>
    </div>
  )
}
