import React from 'react'

import { StateProvider } from "../context/StateProvider";
import { initialState } from "../context/initalState";
import reducer from "../context/reducer";
import { GuestHeader } from '../components/Header';
import MainLayout from './MainLayout';

export default function GuestLayout({children}) {
    return (
        <MainLayout>
            <StateProvider initialState={initialState} reducer={reducer}>
                    <GuestHeader />
                    <div>Main</div>
                    {children}
            </StateProvider>
        </MainLayout>
        
    )
}
