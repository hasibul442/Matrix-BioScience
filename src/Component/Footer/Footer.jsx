import React from 'react'
import { Link } from 'react-router-dom'
import './footer.css'
function Footer() {
  return (
    <>
      <section>
        <div className="footer pt-5 pb-5">
          <div className="container">
            <div className="row">
              <div className="col-md-6"></div>
              <div className="col-md-6">
                <div className="footer-widget">
                  {/* <p className="footer-title">Contact Us</p> */}
                </div>
                <div className="d-flex flex-row">
                  <div className="p-2">
                    <div className="icon-block">
                      <i
                        className="fas fa-map-marker-alt"
                        style={{ color: '#D61C4E' }}
                      ></i>
                    </div>
                  </div>
                  <div className="p-2">
                    <div className="cont-us-text">
                      7 Link Road, Molla Mansion 5th Floor,
                      <br /> Bangla Motor, Dhaka-1000, Bangladesh
                    </div>
                  </div>
                </div>

                <div className="d-flex flex-row">
                  <div className="p-2">
                    <div className="icon-block">
                      <i
                        className="fas fa-phone"
                        style={{ color: '#3330E4' }}
                      ></i>
                    </div>
                  </div>
                  <div className="p-2">
                    <div className="cont-us-text">+8801708527025</div>
                  </div>
                </div>

                <div className="d-flex flex-row">
                  <div className="p-2">
                    <div className="icon-block">
                      <i
                        className="fab fa-whatsapp"
                        style={{ color: '#3EC70B' }}
                      ></i>
                    </div>
                  </div>
                  <div className="p-2">
                    <div className="cont-us-text">+8801708527025</div>
                  </div>
                </div>

                <div className="d-flex flex-row">
                  <div className="p-2">
                    <div className="icon-block">
                      <i
                        className="fas fa-envelope"
                        style={{ color: '#FF5B00' }}
                      ></i>
                    </div>
                  </div>
                  <div className="p-2">
                    <div className="cont-us-text">info@matrixbioscience-bd.com</div>
                  </div>
                </div>
              </div>

              {/* <div className="col-md-5">
                <div className="footer-widget border-bottom">
                  <h5 className="footer-title p-2">About Us</h5>
                </div>
                <p className="text-justify p-2 footer-about-us">
                  Matrix Bioscience an innovative indenting, distribution and
                  Trading company in Bangladesh which started its journey in the
                  year of 2022 with a vision to create change in quality of
                  services through excellent professional delivery to our
                  customers.
                </p>
              </div> */}
            </div>
          </div>
        </div>

        <div className="footer2">
          <div className="container">
            <p className="footer-text my-auto pt-4 pb-4">
              Copyright © {new Date().getFullYear()} Matrix Bio-Science
              Bangladesh.
              <br />
              <small>
                Developed by{' '}
                <a
                  href="https://hasibulhasan.web.app/"
                  rel="noreffer"
                  target="_blank"
                  className="hasib"
                >
                  Hasib
                </a>
              </small>
            </p>
          </div>
        </div>
      </section>
    </>
  )
}

export default Footer
