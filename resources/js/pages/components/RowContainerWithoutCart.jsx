import React, { useEffect, useRef, useState } from "react";
import { MdShoppingBasket } from "react-icons/md";
import { motion } from "framer-motion";
/* import NotFound from "../img/NotFound.svg"; */
import { useStateValue } from "../context/StateProvider";
import { actionType } from "../context/reducer";
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
  

const RowContainer = ({ flag, data, scrollValue }) => {
  console.log();
  const rowContainer = useRef();

  const [items, setItems] = useState([]);

  const [{ cartItems }, dispatch] = useStateValue();

  const addtocart = () => {
    dispatch({
      type: actionType.SET_CARTITEMS,
      cartItems: items,
    });
    localStorage.setItem("cartItems", JSON.stringify(items));
  };

  useEffect(() => {
    rowContainer.current.scrollLeft += scrollValue;
  }, [scrollValue]);

  useEffect(() => {
    addtocart();
  }, [items]);

  const handleAddItem = (item) => {
    const is_added = cartItems.filter((cartItem)=>{
      console.log(cartItem);
      return cartItem.id === item.id
    });

    console.log("is added  " + is_added);
    if (is_added.length > 0){
      toast(item.name + " already added to the cart");
    }else{
      setItems([...cartItems, item]);
      toast(item.name + " added to the cart");
    }
  }

  return (
    <div
      ref={rowContainer}
      className={`w-full flex items-center gap-3  my-12 scroll-smooth  ${
        flag
          ? "overflow-x-scroll scrollbar-none overflow-auto scrollbar-hide"
          : "overflow-x-hidden flex-wrap justify-center"
      }`}
    >
      {data && data.length > 0 ? (
        data.map((item) => (
          <div
            key={item?.id}
            className="w-275 h-[175px] min-w-[275px] md:w-300 md:min-w-[300px]  bg-cardOverlay rounded-lg py-2 px-4  my-12 backdrop-blur-lg hover:drop-shadow-lg flex flex-col items-center justify-evenly relative"
          >
            <div className="w-full flex items-center justify-between">
              <motion.div
                className="w-40 h-40 -mt-8 drop-shadow-2xl"
                whileHover={{ scale: 1.2 }}
              >
                <img
                  src={item.image_path}
                  alt=""
                  className="w-full h-full object-contain"
                />
              </motion.div>
              {/* <motion.div
                whileTap={{ scale: 0.75 }}
                className="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center cursor-pointer hover:shadow-md -mt-8"
                onClick={() => handleAddItem(item)}
              >
                <MdShoppingBasket className="text-white" />
              </motion.div> */}
            </div>

            <div className="w-full flex flex-col items-end justify-end -mt-8">
              <p className="text-textColor font-semibold text-base md:text-lg">
                {item?.name}
              </p>
              {/* <p className="mt-1 text-sm text-gray-500">
                {item?.calories} Calories
              </p> */}
              <div className="flex items-center gap-8">
                <p className="text-lg text-headingColor font-semibold">
                  <span className="text-sm text-red-500">$</span> {item?.price}
                </p>
              </div>
            </div>
          </div>
        ))
      ) : (
        <div className="w-full flex flex-col items-center justify-center">
          {/* <img src={NotFound} className="h-340" /> */}
          <p className="text-xl text-headingColor font-semibold my-2">
            Items Not Available
          </p>
        </div>
      )}
    </div>
  );
};

export default RowContainer;
