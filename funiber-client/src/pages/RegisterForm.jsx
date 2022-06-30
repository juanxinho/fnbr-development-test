import React from 'react';
import { FuniberProgramForms } from '../components/FuniberProgramsForm/FuniberProgramForms';
import { Footer } from '../components/Footer/Footer';
import { Navbar } from '../components/Navbar/Navbar';

export default function RegisterForm() {
  return (
    <>
      <Navbar />
      <FuniberProgramForms />
      <Footer />
    </>
  );
}
