import React from "react";
import "./index.css";
import App from "./App";;
import UserLayout from "./layout/UserLayout";
import  MainContainer from "./components/MainContainer"
import { ToastContainer } from 'react-toastify';


export default function index( { user, heroData, foodItems, currentItems, categories } ) {
  console.log({foodItems});
  return (
    <UserLayout user={user}  foodItems={foodItems}>
      {/* <App /> */}
      {/* <div>Hello </div> */}
        <MainContainer heroData={heroData} currentItems={currentItems} categories={categories} />
        <ToastContainer 
        position="bottom-right"
        autoClose={2000}/>          
    </UserLayout>
  )
}
