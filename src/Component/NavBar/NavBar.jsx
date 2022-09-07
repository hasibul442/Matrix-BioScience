import React, { useState, useEffect } from "react";
import "./navbar.css";
import { Link, NavLink, useLocation } from "react-router-dom";
function NavBar() {
  const [click, setClick] = useState(false);
  const handleClick = () => setClick(!click);

  const [navbar1, setNavbar] = useState(false);

  const changeBackground = () => {
    // console.log(window.scrollY);
    if (window.scrollY > 100) {
      setNavbar(true);
    } else {
      setNavbar(false);
    }
  };

  useEffect(() => {
    changeBackground();
    window.addEventListener("scroll", changeBackground);
  });

  const location = useLocation();
  const [url, setUrl] = useState(null);
  useEffect(() => {
    setUrl(location.pathname);
  },[location]);
  return (
    <>
      <section id="nav-bar">
        <nav
          className={
            navbar1
              ? "navbar navbar-expand-lg shadow navbar-dark ftco_navbar bg-dark ftco-navbar-light nav-backgroung-solid"
              : "navbar navbar-expand-lg shadow navbar-dark ftco_navbar bg-dark ftco-navbar-light nav-backgroung-blur"
          }
          id="ftco-navbar"
        >
          <div className="container">
            <Link className="navbar-brand" to="/">
              <img
                src="/assets/logo/logo.png"
                alt="Company Logo"
                height="70px"
                className="navbar-logo"
              />
            </Link>
            <div
              className="menu-icon navbar-toggler text-dark"
              onClick={handleClick}
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i className={click ? "fas fa-times" : "fas fa-bars"}></i>
            </div>
            <div
              className="collapse navbar-collapse justify-content-end"
              id="navbarSupportedContent"
            >
              <ul className="navbar-nav">
                <li className="nav-item">
                  <NavLink to="/home" className={"nav-link" + (url === '/home' ? " active_1": "" )}>
                    Home
                  </NavLink>
                </li>

                <li className="nav-item">
                  <NavLink to="/aboutus" className={"nav-link" + (url === '/aboutus' ? " active_1": "" )}>
                    Our Story
                  </NavLink>
                </li>

                {/* <li className="nav-item">
                  <NavLink to="/products" className={"nav-link" + (url === '/products' ? " active_1": "" )}>
                  Products we offer
                  </NavLink>
                </li> */}


                <li className="nav-item dropdown dropdown_auto">
                  <NavLink
                    href="#products_list"
                    id="dropdown04"
                    data-toggle="dropdown"
                    aria-expanded="false"
                    to="/products" className={"nav-link dropdown-toggle " + (url === '/products' ? " active_1": "" )}
                  >
                    Products we offer
                  </NavLink>
                  <div
                    className="dropdown-menu dropdown_auto_menu"
                    aria-labelledby="dropdown04"
                  >
                    <Link className="dropdown-item" to="/products">
                      APIs, Excipients and Packaging Materials
                    </Link>
                    <Link className="dropdown-item" to="/products">
                      Laboratory Analytics
                    </Link>
                    <Link className="dropdown-item" to="/products">
                    Marketing and Distribution
                    </Link>
                    <Link className="dropdown-item" to="/products">
                    Export and Regulatory Services
                    </Link>
                  </div>
                </li>

                {/* <li className="nav-item">
                  <Link to="/event-news" className="nav-link">
                    Event & News
                  </Link>
                </li> */}
                <li className="nav-item">
                  <NavLink to="/contactus" className={"nav-link" + (url === '/contactus' ? " active_1": "" )}>
                    Contact Us
                  </NavLink>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </section>
    </>
  );
}

export default NavBar;
