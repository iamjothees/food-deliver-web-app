import React, { useEffect, useState } from "react";
import { IoFastFood } from "react-icons/io5";
/* import { categories } from "../utils/data"; */
import { motion } from "framer-motion";
import RowContainerWithoutCart from "./RowContainerWithoutCart";
import { useStateValue } from "../context/StateProvider";

const MenuContainer = ({categories}) => {
  const [filter, setFilter] = useState(1);

  const [{ foodItems }, dispatch] = useStateValue();
  
  let selectedFoods = [];

  foodItems?.forEach((foodItem) => {
      foodItem.categories?.forEach(category => {
        if (category.id == filter ) {
          console.log('in')
          selectedFoods.push(foodItem);
        }
      })
  } );

  console.log("x");
  console.log(selectedFoods);

  return (
    <section className="w-full my-6" id="menu">
      <div className="w-full flex flex-col items-center justify-center">
        <p className="text-2xl font-semibold capitalize text-headingColor relative before:absolute before:rounded-lg before:content before:w-16 before:h-1 before:-bottom-2 before:left-0 before:bg-gradient-to-tr from-orange-400 to-orange-600 transition-all ease-in-out duration-100 mr-auto">
          Our Hot Dishes
        </p>

        <div className="w-full flex items-center justify-start lg:justify-center gap-8 py-6 overflow-x-scroll scrollbar-none">
          {categories &&
            categories.map((category) => (
              <motion.div
                whileTap={{ scale: 0.75 }}
                key={category.id}
                className={`group ${
                  filter === category.id ? "bg-cartNumBg" : "bg-card"
                } w-24 min-w-[94px] h-28 cursor-pointer rounded-lg drop-shadow-xl flex flex-col gap-3 items-center justify-center hover:bg-cartNumBg `}
                onClick={() => setFilter(category.id)}
              >
                <div
                  className={`w-10 h-10 rounded-full shadow-lg ${
                    filter === category.id
                      ? "bg-white"
                      : "bg-cartNumBg"
                  } group-hover:bg-white flex items-center justify-center`}
                >
                  <IoFastFood
                    className={`${
                      filter === category.id
                        ? "text-textColor"
                        : "text-white"
                    } group-hover:text-textColor text-lg`}
                  />
                </div>
                <p
                  className={`text-sm ${
                    filter === category.id
                      ? "text-white"
                      : "text-textColor"
                  } group-hover:text-white`}
                >
                  {category.name}
                </p>
              </motion.div>
            ))}
        </div>

        <div className="w-full">
          <RowContainerWithoutCart
            flag={false}
            data={selectedFoods}
          />
        </div>
      </div>
    </section>
  );
};

export default MenuContainer;
