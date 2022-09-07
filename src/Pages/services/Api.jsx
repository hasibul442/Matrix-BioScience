import React from "react";
import Products from "../../Component/Brands/Brands";
import "./services.css";

function Api() {
  return (
    <>
      <section className="contact-bg">
        <div className="container">
          <div className="row">
            <div className="col-md-6">
              <p className="my-auto contact-title">
                APIs, Excipients and Packaging Materials
              </p>
            </div>
            <div className="col-md-6">
              <p className="my-auto contact-deriction">
                Home <i className="fas fa-angle-right"></i> Products
              </p>
            </div>
          </div>
        </div>
      </section>

      <section className="pt-5 pb-5">
        <div className="container">
          <div className="row">
            <div className="col-md-6">
              <div>
                <div className="text-center">
                  <div className="mx-auto">
                    <img
                      src="/assets/product/api.jpg"
                      alt=""
                      className="about-us-box-image"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div className="col-md-6">
              <div className="card border-0">
                <div className="card-body shadow">
                  <p className="p-3 service-description">
                    We source and supply a wide range of APIs, excipients and
                    packaging components in pharmaceuticals. Our moto is to work
                    with quality manufacturer who has penetration in regulated
                    market and capable to supply CEP/COS, USDMF grade materials.
                    We are representing International Pharmaceutical
                    manufacturers of UK, Europe, USA, Japan, India, & China.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="pt-5 pb-5">
        <div className="container">
        <p className="product-title mt-3">Products We Offer</p>
        <Products/>
        </div>
      </section>
    </>
  );
}

export default Api;
