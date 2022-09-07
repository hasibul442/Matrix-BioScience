import React from "react";
import { Carousel } from "react-bootstrap";
import { Link } from "react-router-dom";

import OwlCarousel from "react-owl-carousel";
import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel/dist/assets/owl.theme.default.css";

import "./homepage.css";
function Homepage() {
  const settings = {
    className: "owl-theme  pb-5",
    dots: false,
    loop: true,
    center: true,
    // infinite: true,
    slidestoshow: 1,
    slidestoscroll: 1,
    autoplay: true,
    autoplaySpeed: 8000,
    autoplayTimeout: 8000,
    autoplayHoverPause: true,
    margin: 30,
    responsive: {
      0: { items: 1 },
      600: { items: 2 },
      1000: { items: 3 },
    },
  };
  return (
    <>
      <section className="carousel-section">
        <Carousel>
          <Carousel.Item>
            <img
              className="d-block w-100"
              style={{ height: "450px" }}
              src="/assets/banner/Ser-1.jpg"
              alt="Banner_Photo"
            />
          </Carousel.Item>

          <Carousel.Item>
            <img
              className="d-block w-100"
              style={{ height: "450px" }}
              src="/assets/banner/Ser-2.jpg"
              alt="Banner_Photo"
            />
          </Carousel.Item>

          <Carousel.Item>
            <img
              className="d-block w-100"
              style={{ height: "450px" }}
              src="/assets/banner/Ser-3.jpg"
              alt="Banner_Photo"
            />
          </Carousel.Item>

          <Carousel.Item>
            <img
              className="d-block w-100"
              style={{ height: "450px" }}
              src="/assets/banner/Ser-4.jpg"
              alt="Banner_Photo"
            />
          </Carousel.Item>

          <Carousel.Item>
            <img
              className="d-block w-100"
              style={{ height: "450px" }}
              src="/assets/banner/Ser-5.jpg"
              alt="Banner_Photo"
            />
          </Carousel.Item>

          <Carousel.Item>
            <img
              className="d-block w-100"
              style={{ height: "450px" }}
              src="/assets/banner/Ser-6.jpg"
              alt="Banner_Photo"
            />
          </Carousel.Item>

          <Carousel.Item>
            <img
              className="d-block w-100"
              style={{ height: "450px" }}
              src="/assets/banner/Ser-7.jpg"
              alt="Banner_Photo"
            />
          </Carousel.Item>
        </Carousel>
      </section>

      <div className="main-text hidden-xs">
        <div className="col-md-12 ">
          <div className="fixed-text-block p-4">
            <p className="fixed-headline">
              Serving with
              Innovation
            </p>
            <p className="fixed-headline-subtext">
              Strong linkage with healthcare product manufacturers, technology
              and service providers
            </p>
            <div className="text-center">
            <Link to="/aboutus" className="btn btn-outline-primary">
            Read More
            </Link>
            </div>
          </div>
        </div>
      </div>

      <section className="container-fluid">
        <div className="row">
          <div className="col-sm-6 about-us">
            <div className="our-story-block">
              <p className="our-story-title">Our Story</p>
              <div>
                <p className="out-story-details pb-3 pt-5">
                  Matrix Bioscience an innovative indenting, distribution and
                  Trading company in Bangladesh which started its journey in the
                  year of 2022 with a vision to create change in quality of
                  services through excellent professional delivery to our
                  customers....
                </p>
                <Link
                  to="/aboutus"
                  className="learn-more  button-style-2 border-0"
                >
                  <span className="circle" aria-hidden="true">
                    <span className="icon arrow"></span>
                  </span>
                  <span className="button-text">Read More</span>
                </Link>
              </div>
            </div>
          </div>

          <div className="col-sm-6 about-us-box-image"></div>

          <div className="col-sm-6 about-us-box-image-2"></div>

          <div className="col-sm-6 product-box">
            <div className="our-story-block">
              <p className="products-title mt-5">Products We Offer</p>
              <div className="row">
                <div className="col-md-6 pb-3">
                  <div className="card border-0 product-card">
                    <div className="card-body">
                      <div className="text-center pt-2 pb-3">
                        <i
                          className="fas fa-capsules fa-3x"
                          style={{ color: "#F24A72" }}
                        ></i>
                      </div>
                      <div className="text-center">
                        <p className="product-name">
                          APIs, Excipients and Packaging Materials
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-md-6 pb-3">
                  <div className="card border-0 product-card">
                    <div className="card-body">
                      <div className="text-center pt-2 pb-3">
                        <i
                          className="fad fa-vial fa-3x"
                          style={{ color: "#8479E1" }}
                        ></i>
                      </div>
                      <div className="text-center">
                        <p className="product-name">Laboratory Analytics</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-md-6 pb-3">
                  <div className="card border-0 product-card">
                    <div className="card-body">
                      <div className="text-center pt-2 pb-3">
                        <i
                          className="fad fa-handshake-alt fa-3x"
                          style={{ color: "#332FD0" }}
                        ></i>
                      </div>
                      <div className="text-center">
                        <p className="product-name">
                          Marketing and Distribution
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-md-6 pb-3">
                  <div className="card border-0 product-card">
                    <div className="card-body">
                      <div className="text-center pt-2 pb-3">
                        <i
                          className="fad fa-ship fa-3x"
                          style={{ color: "#CE49BF" }}
                        ></i>
                      </div>
                      <div className="text-center">
                        <p className="product-name">
                          Export and Regulatory Services
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div className="brand-bg-size pb-5 pt-5">
          <div className="card border-0">
            <div className="card-body ">
              <p className="product-title mt-3">Our Overseas Partner</p>

              <div>
                <OwlCarousel {...settings}>
                  <div className="item mt-4 mb-4">
                    <div className="card card-shadow border-0">
                      <div className="card-body">
                        <div className="text-center mx-auto">
                          <img
                            src="/assets/partner/Dr._Reddys_Laboratories_Logo.png"
                            alt="Brand logo"
                            style={{ height: "80px", width: "200px" }}
                            className="img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="item mt-4 mb-4">
                    <div className="card card-shadow border-0">
                      <div className="card-body">
                        <div className="text-center mx-auto">
                          <img
                            src="/assets/partner/Poth-Hille-Logo.png"
                            alt="Brand logo"
                            style={{ height: "80px", width: "200px" }}
                            className="img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="item mt-4 mb-4">
                    <div className="card card-shadow border-0">
                      <div className="card-body">
                        <div className="text-center mx-auto">
                          <img
                            src="/assets/partner/kv-logo_sp.png"
                            alt="Brand logo"
                            style={{ height: "80px", width: "200px" }}
                            className="img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="item mt-4 mb-4">
                    <div className="card card-shadow border-0">
                      <div className="card-body">
                        <div className="text-center mx-auto">
                          <img
                            src="/assets/partner/probiotical-spa-logo-vector.png"
                            alt="Brand logo"
                            style={{ height: "80px", width: "200px" }}
                            className="img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="item mt-4 mb-4">
                    <div className="card card-shadow border-0">
                      <div className="card-body">
                        <div className="text-center mx-auto">
                          <img
                            src="/assets/partner/clearsynth_logo_footer.png"
                            alt="Brand logo"
                            style={{ height: "80px", width: "200px" }}
                            className="img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="item mt-4 mb-4">
                    <div className="card card-shadow border-0">
                      <div className="card-body">
                        <div className="text-center mx-auto">
                          <img
                            src="/assets/partner/COE-logo-and-EDQM-web.png"
                            alt="Brand logo"
                            style={{ height: "80px", width: "200px" }}
                            className="img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="item mt-4 mb-4">
                    <div className="card card-shadow border-0">
                      <div className="card-body">
                        <div className="text-center mx-auto">
                          <img
                            src="/assets/partner/british-pharmacopoeia.png"
                            alt="Brand logo"
                            style={{ height: "80px", width: "200px" }}
                            className="img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </OwlCarousel>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default Homepage;
