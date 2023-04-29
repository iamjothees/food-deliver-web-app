import React, { useEffect, useState, useRef } from "react";
import { BiMinus, BiPlus } from "react-icons/bi";
import { motion } from "framer-motion";
import { useStateValue } from "../context/StateProvider";
import { actionType } from "../context/reducer";
/* import { fetchCart } from "../utils/fetchLocalStorageData"; */
let items = [];

const CartItem = ({ item, setFlag, flag, setTotal, total }) => {
  const [{ cartItems }, dispatch] = useStateValue();
  const [qty, setQty] = useState(1);
  //const itemPrice = useRef(item.price);

  console.log(cartItems)
  setTotal(item.price * qty)

  const cartDispatch = () => {
    localStorage.setItem("cartItems", JSON.stringify(items));
    dispatch({
      type: actionType.SET_CARTITEMS,
      cartItems: items,
    });
  };

  const updateQty = (action, id) => {
    if (action == "add") {
      setQty(qty + 1);
      cartItems.map((item) => {
        if (item.id === id) {
          item.qty += 1;
          setFlag(flag + 1);
        }
      });
      cartDispatch();
      setTotal(total + (item.price * qty))
      console.log(total)
    } else {
      // initial state value is one so you need to check if 1 then remove it
      if (qty == 1) {
        items = cartItems.filter((item) => item.id !== id);
        setFlag(flag + 1);
        cartDispatch();
      } else {
        setQty(qty - 1);
        cartItems.map((item) => {
          if (item.id === id) {
            item.qty -= 1;
            setFlag(flag + 1);
          }
        });
        cartDispatch();
        setTotal(total - (item.price))
      }
    }
  };

  useEffect(() => {
    items = cartItems;
  }, [qty, items]);

  /* console.table(item); */

  return (
    <div className="w-full p-1 px-2 rounded-lg bg-cartItem flex items-center gap-2">
      <img
        src={item?.image_path}
        className="w-20 h-20 max-w-[60px] rounded-full object-contain"
        alt=""
      />

      {/* name section */}
      <div className="flex flex-col gap-2">
        <p className="">{item.name}</p>
        <p className="text-sm block font-semibold">
          ₹ {item.price}
        </p>
      </div>

      {/* button section */}
      <div className="group flex items-center gap-2 ml-auto cursor-pointer">
        <motion.div
          whileTap={{ scale: 0.75 }}
          onClick={() => updateQty("remove", item?.id)}
        >
          <BiMinus className="" />
        </motion.div>

        <p className="w-5 h-5 rounded-sm bg-cartBg flex items-center justify-center">
          {qty}
        </p>

        <motion.div
          whileTap={{ scale: 0.75 }}
          onClick={() => updateQty("add", item?.id)}
        >
          <BiPlus className="" />
        </motion.div>
      </div>
    </div>
  );
};

export default CartItem;
