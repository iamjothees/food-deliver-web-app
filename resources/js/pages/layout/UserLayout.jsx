import React from 'react'

import { StateProvider } from "../context/StateProvider";
import { initialState } from "../context/initalState";
import reducer from "../context/reducer";
import { AnimatePresence } from "framer-motion";
import { UserHeader } from '../components/Header';
import CartBar from '../components/CartBar';
import MainLayout from './MainLayout';

export default function UserLayout({children, user, foodItems}) {
    return (
        <MainLayout>
            <StateProvider initialState={{...initialState, 'user':user, 'foodItems':foodItems }} reducer={reducer}>
                <AnimatePresence>
                    <UserHeader />
                    <CartBar />
                    <main className="mt-14 md:mt-20 px-4 md:px-16 py-4 w-full">
                        {children}
                    </main>
                </AnimatePresence>
            </StateProvider>
        </MainLayout>
        
    )
}
