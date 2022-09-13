import React from 'react';
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import './App.css';
import Footer from './Component/Footer/Footer';
import NavBar from './Component/NavBar/NavBar';
import About from './Pages/About/About';
import Contact from './Pages/Contact/Contact';
import Homepage from './Pages/Homepage/Homepage';
import Api from './Pages/services/Api';
import Exports from './Pages/services/Exports';
import Laboratory from './Pages/services/Laboratory';
import Marketing from './Pages/services/Marketing';
import Products from './Pages/services/Products';

function App() {
  return (
    <>
      <Router basename={process.env.PUBLIC_URL}>
        <NavBar />
        <div className="mainbody">
          <Routes>
            <Route path='/' element={<Homepage/>} />
            <Route path='/home' element={<Homepage/>} />
            <Route path='/aboutus' element={<About/>} />
            <Route path='/contactus' element={<Contact/>} />
            {/* <Route path='/api' element={<Api/>} />
            <Route path='/export' element={<Exports/>} />
            <Route path='/laboratory' element={<Laboratory/>} />
            <Route path='/marketing' element={<Marketing/>} /> */}
            <Route path='/products' element={<Products/>} />
          </Routes>
        </div>
        <Footer />
      </Router>
    </>
  );
}

export default App;
