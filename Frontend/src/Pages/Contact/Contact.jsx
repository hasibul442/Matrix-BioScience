import React from "react";
import "./contact.css";
import emailjs from 'emailjs-com';
import Swal from 'sweetalert2';

function Contact() {
  function sendEmail(e) {
    e.preventDefault();

    emailjs.sendForm('service_smtp', 'template_l9z6mnl', e.target, 'UZwNjmpl8Vme4c1Dg')
      .then((result) => {
        result = Swal.fire({
          icon: 'success',
          title: 'Thank You For Contacting Us',
          showConfirmButton: false,
          timer: 1500
        });
      }, (error) => {
        error = Swal.fire({
          icon: 'danger',
          title: 'Opps. Please Try Again',
          showConfirmButton: false,
          timer: 1500
        });
      });
      e.target.reset();
  }
  return (
    <>
      <section className="contact-bg">
        <div className="container">
          <div className="row">
            <div className="col-6">
              <p className="my-auto contact-title">Contact</p>
            </div>
            <div className="col-6">
              <p className="my-auto contact-deriction">
                Home <i className="fas fa-angle-right"></i> Contact Us
              </p>
            </div>
          </div>
        </div>
      </section>

      <section className="container pt-5">
        <div className="row">
          <div className="col-md-4">
            <div className="card border-0">
              <div className="card-body card-size ">
                <h2 className="get-in-touch">Get In Touch</h2>
                <div className="row pt-5">
                  <div className="col-1">
                    <i className="fas fa-phone" style={{ color:" #1CB5E0" }}></i>
                  </div>
                  <div className="col-11">
                    <p className="icon-text">+8801708527025</p>
                  </div>
                  <div className="col-1">
                    <i className="fab fa-whatsapp icon-color" style={{ color:" #59cf8f" }}></i>
                  </div>
                  <div className="col-11">
                    <p className="icon-text">+8801708527025</p>
                  </div>
                  <div className="col-1">
                    <i className="fas fa-comment-alt-dots icon-color" style={{ color:" #ff4a4a" }}></i>
                  </div>
                  <div className="col-11">
                    <p className="icon-text">info@matrixbioscience-bd.com</p>
                  </div>
                  <div className="col-1">
                    <i className="fas fa-location icon-color" style={{ color:" #533483" }}></i>
                  </div>
                  <div className="col-11">
                    <p className="icon-text">
                      7 Link Road, Molla Mansion 5th Floor,<br/> Bangla Motor,
                      Dhaka-1000, Bangladesh
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="col-md-8">
            <div className="card border-0">
              <div className="card-body card-size ">
                <h1 className="map-block-title text-right">Direction</h1>
                <div className="pt-3">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.0504583926663!2d90.39125691414282!3d23.74557999487917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b94e72b5fc59%3A0xa6b676c9773943a!2sMatrix%20Bioscience!5e0!3m2!1sen!2sbd!4v1661878110348!5m2!1sen!2sbd"
                    width="100%"
                    height="250"
                    style={{ border: 0 }}
                    allowFullScreen=""
                    title="Google Map Location"
                    loading="lazy"
                    referrerPolicy="no-referrer-when-downgrade"
                  ></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div className="mt-5 mb-5">
          <div className="container">
            <div className="card border-0">
              <div className="card-body " style={{ backgroundColor:"#F4FCD9" }}>
                <div className="block-title mt-5" style={{ color:"#000" }}>Write to Us</div>

                <div className="">
                  <div className="row mt-3 mb-5">
                    <div className="col-sm-2"></div>
                    <div className="col-sm-8 border">
                      <form className="pt-4 pb-4 contact-form" onSubmit={sendEmail}>
                        <div className="form-group row">
                          <div className="col-sm-6 pb-3">
                            <input
                              type="text"
                              className="form-control border-0 border-bottom pb-3"
                              id="staticEmail"
                              placeholder="Name *"
                              name="full_name"
                            />
                          </div>

                          <div className="col-sm-6 pb-3">
                            <input
                              type="email"
                              className="form-control border-0 border-bottom pb-3"
                              id="staticEmail"
                              placeholder="Email *"
                              name="email"
                            />
                          </div>

                          <div className="col-sm-6 pb-3">
                            <input
                              type="text"
                              className="form-control border-0 border-bottom pb-3"
                              id="staticEmail"
                              placeholder="Company *"
                              name="company"
                            />
                          </div>

                          <div className="col-sm-6 pb-3">
                            <input
                              type="text"
                              className="form-control border-0 border-bottom pb-3"
                              id="staticEmail"
                              placeholder="Country *"
                              name="country"
                            />
                          </div>

                          <div className="col-sm-12 pb-3">
                            <input
                              type="text"
                              className="form-control border-0 border-bottom pb-3"
                              id="staticEmail"
                              placeholder="Subject *"
                              name="subject"
                            />
                          </div>

                          <div className="col-sm-12">
                            <textarea
                              type="text"
                              className="form-control border-0 border-bottom pb-3"
                              id="staticEmail"
                              placeholder="Messages *"
                              rows={5}
                              name="message"
                            ></textarea>
                          </div>
                        </div>
                        <div className="pb-3 pt-5 text-center">
                          <button
                            className="btn btn-primary button-style"
                            type="submit"
                          >
                            <span>Send Message</span>
                            <div className="wave"></div>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default Contact;
