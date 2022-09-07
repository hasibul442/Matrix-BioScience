import React from 'react';
import './about.css';

function About() {
  return (
    <>
        <section className="about-bg">
        <div className="container">
          <div className="row">
            <div className="col-md-6">
              <p className="my-auto about-title">Our Story</p>
            </div>
            <div className="col-md-6">
              <p className="my-auto contact-deriction">
                Home <i className="fas fa-angle-right"></i> Our Story
              </p>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div className="container mt-5 mb-5">
          <div className="row">
            <div className="col-md-6">
            <div className="text-center">
                <div className="mx-auto">
                  <img
                    src="/assets/background/ourstory-3.jpg"
                    alt=""
                    className="about-us-box img-fluid"
                  />
                </div>
              </div>
            </div>

            <div className="col-md-6">
              <div className="card border-0">
                <div className="">
                  <p className='aboutus-text px-4 pt-5'>
                  <b>Matrix Bioscience</b> an innovative indenting, distribution and Trading company in Bangladesh which started its journey in the year of 2022 with a vision to create change in quality of services through excellent professional delivery to our customers. <br/><br/>
                  We engaged in supplying Laboratory Consumables, APIs, Excipients, and Packaging Materials for Pharmaceuticals. We are also supplying feed additives, vitamins, Enzymes and Probiotics for the Food, Feed and Edible Oil Industry. <br/><br/>
                  <b>Matrix Bioscience</b> has strong linkage with healthcare product manufacturers, technology and service providers. Its associate office, based in UK, maintains liaison with reputed companies worldwide. An expert team works to source and supply a wide range of products from UK, Europe and USA for pharmaceutical companies in Bangladesh.
                  </p>
                </div>
              </div>
            </div>

            <div className="col-md-12">
              <div className="card border-0">
                <div className="">
                  <p className='aboutus-text px-4 pt-2'>
                  The company has skilled technical personnel like engineers, pharmacists, microbiologists, and business graduates from home and abroad having hands-on experience in Healthcare and Pharmaceutical Industry. The company has strong footsteps in all the leading pharmaceuticals company of Bangladesh. <br/><br/>
                  We inject our knowledge and expertise to add value in the supply chain of healthcare industry in Bangladesh. We ensure quick response, service consistency, product reliability and in time delivery. Our professional team works closely with our clients, principals and suppliers to ensure innovative solutions, product quality and competitiveness.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}

export default About