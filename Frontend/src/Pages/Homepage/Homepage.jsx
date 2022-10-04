import React, { useState } from "react";
import { Carousel } from "react-bootstrap";
import { Link } from "react-router-dom";

import OwlCarousel from "react-owl-carousel";
import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel/dist/assets/owl.theme.default.css";

import "./homepage.css";
import { useEffect } from "react";
import axios from "axios";
import parse from 'html-react-parser';

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

  const [banners, setBanners] = useState([]);
  const [bannertext, setBannerText] = useState([]);
  const [producttitle, setProductTitle] = useState([]);
  const [brands, setBrands] = useState([]);
  const [ourstory, setOurStory] = useState([]);

  const fetchData = async () => {
    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/banners")
      .then(({ data }) => {
        setBanners(data.banner_details);
      });

    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/bannertext")
      .then(({ data }) => {
        setBannerText(data.bannertext);
      });

    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/products")
      .then(({ data }) => {
        setProductTitle(data.products);
      });

    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/brand")
      .then(({ data }) => {
        setBrands(data.brands);
      });

    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/ourstory")
      .then(({ data }) => {
        setOurStory(data.ourstory);
      });
  };

  // const fetchBannerText = async () => {

  // };

  useEffect(() => {
    fetchData();
    // fetchBannerText();
  }, []);

  // console.log(banners);
  return (
    <>
      <section className="carousel-section">
        {banners.length > 0 && (
          <Carousel>
            {banners.map((banner) => (
              <Carousel.Item key={banner.id}>
                <img
                  className="d-block w-100 banner-image"
                  src={`https://admin.matrixbioscience-bd.com/assets/image/banner/${banner.image}`}
                  alt="Banner_Photo"
                />
              </Carousel.Item>
            ))}
          </Carousel>
        )}
      </section>

      <div className="main-text hidden-xs">
        {bannertext.length > 0 && (
          <div className="col-md-12 ">
            {bannertext.map((bannertext) => (
              <div className="fixed-text-block p-4" key={bannertext.id}>
                <p className="fixed-headline">{bannertext.title}</p>
                <p className="fixed-headline-subtext">
                  {" "}
                  {bannertext.subtitle}{" "}
                </p>
                <div className="text-right">
                  <Link to="/aboutus" className="btn btn-primary">
                    Read More
                  </Link>
                </div>
              </div>
            ))}
          </div>
        )}
      </div>

      <section className="container-fluid">
        <div className="row">
          <div className="col-sm-6 about-us">
            <div className="our-story-block">
              <p className="our-story-title">Our Story</p>
              {ourstory.length > 0 && (
                <div>
                  {ourstory.map((ourstory) => (
                    <p className="out-story-details  pt-5" key={ourstory.id} >
                       {ourstory.short_description} . . . .
                    </p>
                  ))}

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
              )}
            </div>
          </div>

          <div className="col-sm-6 about-us-box-image"></div>

          <div className="col-sm-6 about-us-box-image-2"></div>

          <div className="col-sm-6 product-box">
            <div className="our-story-block">
              <p className="products-title mt-5 pt-3">Products We Offer</p>
              {producttitle.length > 0 && (
                <div className="px-3 pt-5">
                  {producttitle.map((producttitle) => (
                    <Link
                      to="/products"
                      className="product-link"
                      key={producttitle.id}
                    >
                      <p className="product-name">
                        <i
                          className="fad fa-hand-point-right"
                          style={{ color: "#000" }}
                        ></i>{" "}
                        {producttitle.title}
                      </p>
                    </Link>
                  ))}
                </div>
              )}
            </div>
          </div>
        </div>
      </section>

      <section>
        <div className="brand-bg-size pb-5 pt-5">
          <div className="card border-0">
            <div className="card-body ">
              <p className="product-title mt-3">Our Principals</p>
              {brands.length > 0 && (
                <div>
                  <OwlCarousel {...settings}>
                    {brands.map((brand) => (
                      <div className="item mt-4 mb-4" key={brand.id}>
                        <div className="card card-shadow border-0">
                          <div className="card-body">
                            <div className="text-center mx-auto">
                              <img
                                src={`https://admin.matrixbioscience-bd.com/assets/image/brand/${brand.image}`}
                                alt="Brand logo"
                                style={{ height: "80px", width: "200px" }}
                                className="img-fluid"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    ))}
                  </OwlCarousel>
                </div>
              )}
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default Homepage;
