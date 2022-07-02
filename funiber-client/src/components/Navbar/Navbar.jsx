import React from 'react';
import { ApplicationLogo } from '../ApplicationLogo/ApplicationLogo';

export const Navbar = () => {
  return (
    <header>
      <div className="bg-blue-500">
        <div className="w-full px-2 py-4 mx-auto sm:px-6 lg:px-4">
          <div className="sm:flex sm:items-center sm:justify-between"></div>
        </div>
      </div>
      <div className="max-w-screen-xl px-4 mx-auto sm:py-1 sm:px-4 lg:px-2">
        <div className="sm:justify-between sm:items-center sm:flex">
          <div className="text-center sm:text-left">
            <ApplicationLogo />
          </div>
        </div>
        <hr className="w-full" />
      </div>
    </header>
  );
};
