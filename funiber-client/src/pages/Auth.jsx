import React from 'react';
import { FuniberProgramForms } from '../components/FuniberProgramsForm/FuniberProgramForms';
import { Footer } from '../components/Footer/Footer';
import { Navbar } from '../components/Navbar/Navbar';

export default function Auth() {
  return (
    <>
      <Navbar />
      <FuniberProgramForms />
      <Footer />
    </>
  );
}
