import React from "react";
import "./index.css";
import App from "./App";
import GuestLayout from "./layout/GuestLayout";
import { usePage } from "@inertiajs/react";


export default function index() {

  const { flash } = usePage().props

  return (
    <GuestLayout>
        <MainContainer heroData={heroData} currentItems={currentItems} categories={categories} />
        <ToastContainer 
        position="bottom-right"
        autoClose={2000}/>  
    </GuestLayout>
  )
}
