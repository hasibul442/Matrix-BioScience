import React from "react";
import Brands from "../../Component/Brands/Brands";
function Products() {
  return (
    <>
      <section className="contact-bg">
        <div className="container">
          <div className="row">
            <div className="col-md-6">
              <p className="my-auto contact-title">Products</p>
            </div>
            <div className="col-md-6">
              <p className="my-auto contact-deriction">
                Home <i className="fas fa-angle-right"></i> Products
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* <section className="pt-5 pb-5">
        <div className="container">
          <div className="row">
            <div className="col-md-6">
              <div>
                <div className="text-center">
                  <div className="mx-auto">
                    <img
                      src="/assets/product/lab.jpg"
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
                  A professional and technically skilled team is engaged to supply all types of laboratory instruments, spares, consumables and services for QC, QA, Microbiology, Analytical and R&D labs of Pharmaceuticals. We represent a number of lab analytic solutions providers who can deliver a wide range of products.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> */}

      <section className="pt-5 pb-5">
        <div className="container">
          <div className="card border-0">
            <div className="shadow">
              <div className="row pt-5">
                <div className="col-md-12 product-block">
                  <div className="row pb-5">
                    <div className="col-md-4 ">
                      <img
                        src="/assets/product/api.jpg"
                        alt=""
                        className="product-image img-fluid"
                      />
                    </div>
                    <div className="col-md-8 product-description">
                      <p className="service-product-title mx-5 mt-4">
                        APIs, Excipients and Packaging Materials
                      </p>
                      <p className="mx-5  pt-3 service-description">
                        We source and supply a wide range of APIs, excipients
                        and packaging components in pharmaceuticals. Our moto is
                        to work with quality manufacturer who has penetration in
                        regulated market and capable to supply CEP/COS, USDMF
                        grade materials. We are representing International
                        Pharmaceutical manufacturers of UK, Europe, USA, Japan,
                        India, & China.
                      </p>
                    </div>
                  </div>
                </div>

                <div className="col-md-12 product-block">
                  <div className="row pb-5 pt-5">
                  <div className="col-md-8 product-description">
                      <p className="service-product-title mx-5 mt-4">
                        Laboratory Analytics
                      </p>
                      <p className="mx-5  pt-3 service-description">
                        A professional and technically skilled team is engaged
                        to supply all types of laboratory instruments, spares,
                        consumables and services for QC, QA, Microbiology,
                        Analytical and R&D labs of Pharmaceuticals. We represent
                        a number of lab analytic solutions providers who can
                        deliver a wide range of products.
                      </p>
                    </div>
                    <div className="col-md-4 ">
                      <img
                        src="/assets/product/lab.jpg"
                        alt=""
                        className="product-image img-fluid"
                      />
                    </div>
                  </div>
                </div>

                <div className="col-md-12 product-block">
                  <div className="row pb-5 pt-5">
                    <div className="col-md-4 ">
                      <img
                        src="/assets/product/marketing.jpg"
                        alt=""
                        className="product-image img-fluid"
                      />
                    </div>
                    <div className="col-md-8 product-description">
                      <p className="service-product-title mx-5 mt-4">
                        Marketing and Distribution
                      </p>
                      <p className="mx-5  pt-3 service-description">
                      Matrix Bioscience offers marketing and distribution
                      supports for multinational pharmaceutical and
                      biopharmaceutical companies who want to explore highly
                      potential Bangladesh market. Our experienced and dynamic
                      marketing team is ready to promote high-tech and
                      innovative products of renowned multinational companies to
                      the medical professionals in Bangladesh.
                      </p>
                    </div>
                  </div>
                </div>

                <div className="col-md-12 product-block">
                  <div className="row pb-5 pt-5">
                  <div className="col-md-8 product-description">
                      <p className="service-product-title mx-5 mt-4">
                        Export and Regulatory Services
                      </p>
                      <p className="mx-5  pt-3 service-description">
                      We offer services for Bangladeshi pharmaceutical companies
                      to explore export opportunities of their products. An
                      expert team with experiences and understanding of
                      international trading and regulatory requirements of
                      pharmaceutical products is capable of processing product
                      development, registration strategies and successful
                      registration with regulatory authorities.
                      </p>
                    </div>
                    <div className="col-md-4 ">
                      <img
                        src="/assets/product/export.jpg"
                        alt=""
                        className="product-image img-fluid"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* <section className="pt-5 pb-5">
        <div className="container">
          <div className="">
            <div className="card product-block border-0">
              <div className="shadow">
                <div className="row">
                  <div className="col-md-4 product-image api-bg-image"></div>
                  <div className="col-md-8 product-description">
                    <p className="service-product-title mt-4">
                      APIs, Excipients and Packaging Materials
                    </p>
                    <p className="mx-5 pb-3 pt-3 service-description">
                      We source and supply a wide range of APIs, excipients and
                      packaging components in pharmaceuticals. Our moto is to
                      work with quality manufacturer who has penetration in
                      regulated market and capable to supply CEP/COS, USDMF
                      grade materials. We are representing International
                      Pharmaceutical manufacturers of UK, Europe, USA, Japan,
                      India, & China.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="pb-5">
            <div className="card product-block border-0">
              <div className="shadow">
                <div className="row">
                  <div className="col-md-8 product-description">
                    <p className="service-product-title mt-4">
                      Laboratory Analytics
                    </p>
                    <p className="mx-5 pb-3 pt-3 service-description">
                      A professional and technically skilled team is engaged to
                      supply all types of laboratory instruments, spares,
                      consumables and services for QC, QA, Microbiology,
                      Analytical and R&D labs of Pharmaceuticals. We represent a
                      number of lab analytic solutions providers who can deliver
                      a wide range of products.
                    </p>
                  </div>
                  <div className="col-md-4 product-image lab-bg-image"></div>
                </div>
              </div>
            </div>
          </div>

          <div className="pb-5">
            <div className="card product-block border-0">
              <div className="shadow">
                <div className="row">
                  <div className="col-md-4 product-image marketing-bg-image"></div>
                  <div className="col-md-8 product-description">
                    <p className="service-product-title mt-4">
                      Marketing and Distribution
                    </p>
                    <p className="mx-5 pb-3 pt-3 service-description">
                      Matrix Bioscience offers marketing and distribution
                      supports for multinational pharmaceutical and
                      biopharmaceutical companies who want to explore highly
                      potential Bangladesh market. Our experienced and dynamic
                      marketing team is ready to promote high-tech and
                      innovative products of renowned multinational companies to
                      the medical professionals in Bangladesh.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="pb-5">
            <div className="card product-block border-0">
              <div className="shadow">
                <div className="row">
                  <div className="col-md-8 product-description">
                    <p className="service-product-title mt-4">
                      Export and Regulatory Services
                    </p>
                    <p className="mx-5 pb-3 pt-3 service-description">
                      We offer services for Bangladeshi pharmaceutical companies
                      to explore export opportunities of their products. An
                      expert team with experiences and understanding of
                      international trading and regulatory requirements of
                      pharmaceutical products is capable of processing product
                      development, registration strategies and successful
                      registration with regulatory authorities.
                    </p>
                  </div>
                  <div className="col-md-4 product-image exports-bg-image"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> */}

      <section className="pt-5 pb-5">
        <div className="container">
          <div className="card border-0">
            <div className="card-body shadow">
              <p className="product-title mt-3">Our Overseas Partner</p>
              <Brands />
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default Products;
