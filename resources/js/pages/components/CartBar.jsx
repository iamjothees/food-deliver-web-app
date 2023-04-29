import React, { useState } from 'react'
import { MdClose } from "react-icons/md";
import { motion } from "framer-motion";
import { useStateValue } from "../context/StateProvider";
import CartItem from "./CartItem";


export default function CartBar() {

  const [{ cartShow, cartItems, user }, dispatch] = useStateValue();
  const [flag, setFlag] = useState(1);
  const [total, setTotal] = useState(0);
  console.log(total)

  return (
    <>
        {/* <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#cartBar" role="button" aria-controls="offcanvasExample">
        Link with href
        </a>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Button with data-bs-target
        </button> */}

        <div className="offcanvas offcanvas-end" tabIndex="-1" id="cartBar" aria-labelledby="cartBar">
        <div className="offcanvas-header d-flex justify-content-between">
            <div></div>
            <h4 className="text-center fs-2">Cart</h4>
            <button type="button" className="btn btn-close fs-1" data-bs-dismiss="offcanvas" aria-label="Close"><MdClose /></button>
        </div>
        <div className="offcanvas-body">

          <motion.div>
            {/* <div className="w-full flex items-center justify-between p-4 cursor-pointer">
              <motion.div whileTap={{ scale: 0.75 }} onClick={showCart}>
                <MdOutlineKeyboardBackspace className="text-textColor text-3xl" />
              </motion.div>
              <p className="text-textColor text-lg font-semibold">Cart</p>

              <motion.p
                whileTap={{ scale: 0.75 }}
                className="flex items-center gap-2 p-1 px-2 my-2 bg-gray-100 rounded-md hover:shadow-md  cursor-pointer text-textColor text-base"
                onClick={clearCart}
              >
                Clear <RiRefreshFill />
              </motion.p>
            </div> */}

            {/* bottom section */}
            {cartItems && cartItems.length > 0 ? (
              <div className="w-full h-full bg-cartBg rounded-t-[2rem] flex flex-col">
                {/* cart Items section */}
                <div className="w-full h-340 md:h-42 px-6 py-10 flex flex-col gap-3 overflow-y-scroll scrollbar-none">
                  {/* cart Item */}
                  {cartItems &&
                    cartItems.length > 0 &&
                    cartItems.map((item) => (
                      <CartItem
                        key={item.id}
                        item={item}
                        setFlag={setFlag}
                        flag={flag}
                        setTotal = {setTotal}
                        total = {total}
                      />
                    ))}
                </div>

                {/* cart total section */}
                <div className="w-full flex-1 bg-cartTotal rounded-t-[2rem] flex flex-col items-center justify-evenly px-8 py-2">
                  <div className="w-full flex items-center justify-between">
                    <p className="text-gray-400 text-lg">Sub Total</p>
                    <p className="text-gray-400 text-lg">₹ {total}</p>
                  </div>
                  <div className="w-full flex items-center justify-between">
                    <p className="text-gray-400 text-lg">Delivery</p>
                    <p className="text-gray-400 text-lg">₹ 50</p>
                  </div>

                  <div className="w-full border-b border-gray-600 my-2"></div>

                  <div className="w-full flex items-center justify-between">
                    <p className="text-gray-200 text-xl font-semibold">Total</p>
                    <p className="text-gray-200 text-xl font-semibold">
                      ₹{total + 50}
                    </p>
                  </div>

                  {user ? (
                    <button class="mt-5 btn btn-warning text-light">
                      Check Out
                    </button>
                      
                    
                  ) : (
                    <button class="mt-5 btn btn-warning text-light">
                      Login to check out
                      </button>
                  )}
                </div>
              </div>
            ) : (
              <div className="h-full flex flex-col items-center justify-center gap-6">
                <p className="text-xl text-textColor font-semibold">
                  Add some items to your cart
                </p>
              </div>
            )}
          </motion.div>
            
        </div>
        </div>
    </>
  )
}
