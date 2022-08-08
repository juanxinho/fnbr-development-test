import React, { Component } from 'react';
import ReactDOM from 'react-dom';

// import App component
import App from './src/App'

if (document.getElementById('root')) {
  ReactDOM.render(<App />, document.getElementById('root'));
}
