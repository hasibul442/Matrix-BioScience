import axios from 'axios'
import React from 'react'
import { useEffect } from 'react'
import { useState } from 'react'
import './about.css'
import parse from 'html-react-parser';

function About() {
  const [ourstory, setOurStory] = useState([])
  const feachData = async () => {
    await axios
      .get('https://admin.matrixbioscience-bd.com/api/v1/ourstory')
      .then(({ data }) => {
        setOurStory(data.ourstory)
      })
  }

  useEffect(() => {
    feachData()
    // fetchBannerText();
  }, [])

  return (
    <>
      <section className="about-bg">
        <div className="container">
          <div className="row">
            <div className="col-6">
              <p className="my-auto about-title">Our Story</p>
            </div>
            <div className="col-6">
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
            {ourstory.length > 0 && (
              <div className="col-md-6">
                {ourstory.map((ourstory) => (
                  <div className="card border-0"  key={ourstory.id}>
                    <div className="card-body border-0">
                      <div className="text-center">
                        <div className="mx-auto">
                          <img
                            src={`https://admin.matrixbioscience-bd.com/assets/image/ourstories/${ourstory.image}`}
                            alt=""
                            className="about-us-box img-fluid"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            )}

            {ourstory.length > 0 && (
              <div className="col-md-6" >
                {ourstory.map((ourstory) => (
                  <div className="card border-0" key={ourstory.id}>
                    <div className="">
                      <div className="aboutus-text pt-5">
                        {parse(ourstory.description)}
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            )}

          </div>
        </div>
      </section>
    </>
  )
}

export default About
