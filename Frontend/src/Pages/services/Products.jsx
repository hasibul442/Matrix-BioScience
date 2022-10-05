import React, { useEffect, useState } from "react";
import Brands from "../../Component/Brands/Brands";
import "./services.css";
import axios from "axios";
function Products() {
  const [producttitle, setProductTitle] = useState([]);
  const fetchData = async () => {
    await axios
      .get("https://admin.matrixbioscience-bd.com/api/v1/products")
      .then(({ data }) => {
        setProductTitle(data.products);
      });
  };
  useEffect(() => {
    fetchData();
  }, []);

  // function productPosition() {
  //   producttitle.length > 0 &&
  //     producttitle.map((item) => {
  //       if (item.image_side === "Left") {
  //         return (
  //           <div className="row pb-5" key={item.id}>
  //             <div className="col-md-5 ">
  //               <img
  //                 src={`https://admin.matrixbioscience-bd.com/assets/image/product/${item.image}`}
  //                 alt=""
  //                 className="product-image img-fluid"
  //               />
  //             </div>
  //             <div className="col-md-7 product-description my-auto">
  //               <p className="service-product-title mt-4">{item.title}</p>
  //               <p className="pt-3 service-description">{item.description}</p>
  //             </div>
  //           </div>
  //         );
  //       } else {
  //         return (
  //           <div className="row pb-5" key={item.id}>
  //             <div className="col-md-7 product-description my-auto">
  //               <p className="service-product-title mt-4">{item.title}</p>
  //               <p className="pt-3 service-description">{item.description}</p>
  //             </div>
  //             <div className="col-md-5 ">
  //               <img
  //                 src={`https://admin.matrixbioscience-bd.com/assets/image/product/${item.image}`}
  //                 alt=""
  //                 className="product-image img-fluid"
  //               />
  //             </div>
  //           </div>
  //         );
  //       }
  //     });
  // }

  return (
    <>
      <section className="contact-bg">
        <div className="container">
          <div className="row">
            <div className="col-6">
              <p className="my-auto contact-title">Products</p>
            </div>
            <div className="col-6">
              <p className="my-auto contact-deriction">
                Home <i className="fas fa-angle-right"></i> Products
              </p>
            </div>
          </div>
        </div>
      </section>

      <section className="pt-5 pb-5">
        <div className="container">
          <div className="card border-0">
            <div className="">
              {producttitle.length > 0 && (
                <div className="row pt-5">
                  {producttitle.map((product) => (
                    <div className="col-md-12 product-block">
                      {product.image_side === "Left" ? (
                        <div className="row pb-5">
                          <div className="col-md-5 ">
                            <img
                              src={`https://admin.matrixbioscience-bd.com/assets/image/product/${product.image}`}
                              alt=""
                              className="product-image img-fluid"
                            />
                          </div>
                          <div className="col-md-7 product-description my-auto">
                            <p className="service-product-title mt-4">
                              {product.title}
                            </p>
                            <p className="pt-3 service-description">
                              {product.description}
                            </p>
                          </div>
                        </div>
                      ) : (
                        <div className="col-md-12 product-block">
                          <div className="row pb-5 pt-5">
                            <div className="col-md-7 product-description my-auto">
                              <p className="service-product-title mt-4">
                                {product.title}
                              </p>
                              <p className="pt-3 service-description">
                                {product.description}
                              </p>
                            </div>
                            <div className="col-md-5 ">
                              <img
                                src={`https://admin.matrixbioscience-bd.com/assets/image/product/${product.image}`}
                                alt=""
                                className="product-image img-fluid"
                              />
                            </div>
                          </div>
                        </div>
                      )}
                    </div>
                  ))}
                </div>
              )}
            </div>
          </div>
        </div>
      </section>

      <section className="pt-5 pb-5">
        <div className="container">
          <div className="card border-0">
            <div className="card-body">
              <p className="product-title mt-3">Our Principals</p>
              <Brands />
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default Products;
