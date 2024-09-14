import React from 'react'

export default function page() {
  return (
    <div>
      <div className='border-white border-2 w-[15rem] h-[25rem]   p-4'>
        <h1 className='font-bold'>Admin Menu</h1>
        <div className='mt-[1rem]'>
          <a className='hover:text transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-violet-500 p-2 rounded-full w-[8rem] h-[3rem] border-2 border_white text-center mt-[6rem]' href="/car_table/index">car table</a>
        </div>
        <div className='mt-[2rem]'>
          <a className='hover:text transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-violet-600 p-2 rounded-full w-[8rem] h-[3rem] border-2 border_white text-center mt-[6rem]' href="/brand_table/index">brand table</a>
        </div>
        <div className='mt-[2rem]'>
          <a className='hover:text transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-purple-700 p-2 rounded-full w-[8rem] h-[3rem] border-2 border_white text-center mt-[6rem]' href="/engine_table/index">engine table</a>
        </div>

        <div className='mt-[2rem]'>
        <a href="/">home</a>
      </div>
      </div>
    </div>
  )
}
