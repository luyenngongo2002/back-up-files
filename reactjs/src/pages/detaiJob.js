import React from "react";
import "../asset/scss/detailjob.scss";
import BoxInfor from "../components/detailjob/boxInfor";
import SumaryJob from "../components/detailjob/sumaryJob";
import DetaiMainJob from "../components/detailjob/detaiJob-main";
import SimilarJob from "../components/detailjob/similarJob";
export default function DetailJob() {
  return (
    <div className="container">
      <div className="jobdetail">
        <div className="jobdetail__header">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur
          dolorem expedita impedit
        </div>
        <div className="jobdetail__main">
          <DetaiMainJob />
          <div className="main__boxdetail ">
            <BoxInfor />
            <div className="boxdetail__exconten">
              <SumaryJob />
              <SimilarJob />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
