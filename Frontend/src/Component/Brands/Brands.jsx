import React, { useState, useEffect } from "react";
import OwlCarousel from "react-owl-carousel";
import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel/dist/assets/owl.theme.default.css";
import axios from "axios";
function Brands() {
  const settings = {
    className: "owl-theme  pb-5",
    dots: false,
    loop: true,
    center: true,
    // infinite: true,
    slidestoshow: 1,
    slidestoscroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    margin: 30,
    responsive: {
      0: { items: 1 },
      600: { items: 2 },
      1000: { items: 3 },
    },
  };

  const [brands, setBrands] = useState([]);
  const fetchData = async () => {
    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/brand")
      .then(({ data }) => {
        setBrands(data.brands);
      });
  };

  useEffect(() => {
    fetchData();
    // fetchBannerText();
  }, []);
  return (
    <>
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
    </>
  );
}

export default Brands;
