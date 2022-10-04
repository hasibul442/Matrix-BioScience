import React, { useState, useEffect } from "react";
import "./navbar.css";
import { Link, NavLink, useLocation } from "react-router-dom";
import axios from "axios";
function NavBar() {
  const [click, setClick] = useState(false);
  const handleClick = () => setClick(!click);

  const location = useLocation();
  const [url, setUrl] = useState(null);
  useEffect(() => {
    setUrl(location.pathname);
  }, [location]);

  const [producttitle, setProductTitle] = useState([]);
  const fetchData = async () => {
    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/products")
      .then(({ data }) => {
        setProductTitle(data.products);
      });
  }
  
    useEffect(() => {
    fetchData();
    // fetchBannerText();
    }, []);
  
  return (
    <>
      <section id="nav-bar">
        <nav
          className={
            "navbar navbar-expand-lg shadow navbar-light ftco_navbar bg-light ftco-navbar-light nav-backgroung-solid"
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
              className="menu-icon navbar-toggler"
              onClick={handleClick}
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i
                className={click ? "fas fa-times" : "fas fa-bars"}
                style={{ color: "#000" }}
              ></i>
            </div>
            <div
              className="collapse navbar-collapse justify-content-end"
              id="navbarSupportedContent"
            >
              <ul className="navbar-nav">
                <li className="nav-item">
                  <NavLink
                    to="/home"
                    className={
                      "nav-link" + (url === "/home" ? " active_1" : "")
                    }
                  >
                    Home
                  </NavLink>
                </li>

                <li className="nav-item">
                  <NavLink
                    to="/aboutus"
                    className={
                      "nav-link" + (url === "/aboutus" ? " active_1" : "")
                    }
                  >
                    Our Story
                  </NavLink>
                </li>

                <li className="nav-item dropdown dropdown_auto">
                  <NavLink
                    id="dropdown04"
                    data-toggle="dropdown"
                    aria-expanded="true"
                    to="/products"
                    className={
                      "nav-link dropdown-toggle " +
                      (url === "/products" ? " active_1" : "")
                    }
                  >
                    Products we offer
                  </NavLink>
                  {producttitle.length > 0 && (
                  <div
                    className="dropdown-menu dropdown_auto_menu"
                    aria-labelledby="dropdown04"
                    >
                      {producttitle.map((producttitle) => (
                    <Link className="dropdown-item" to="/products" key={producttitle.id}>
                       {producttitle.title}
                      </Link>
                    ))}
                    {/* <Link className="dropdown-item" to="/products">
                      Laboratory Analytics
                    </Link>
                    <Link className="dropdown-item" to="/products">
                      Marketing and Distribution
                    </Link>
                    <Link className="dropdown-item" to="/products">
                      Export and Regulatory Services
                    </Link> */}
                    </div>
                    )}
                </li>

                {/* <li className="nav-item dropdown dropdown-menu-2" >
                  <NavLink
                    className={
                      "nav-link dropdown-toggle " +
                      (url === "/products" ? " active_1" : "")
                    }
                    id="navbarScrollingDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="true"
                    to="/products"
                  >
                    Products we offer
                  </NavLink>
                  <ul
                    className="dropdown-menu  border-0"
                    aria-labelledby="navbarScrollingDropdown"
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
                  </ul>
                </li> */}

                <li className="nav-item">
                  <NavLink
                    to="/contactus"
                    className={
                      "nav-link" + (url === "/contactus" ? " active_1" : "")
                    }
                  >
                    Contact
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
