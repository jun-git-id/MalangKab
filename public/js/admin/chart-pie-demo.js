// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
// var dataKec = document.getElementById("dataByKec").value;
var jmlKec = document.getElementById("jmlKec").value;
var randomColor = [];
var randomColorHover = [];

console.log(randomColor);
var dataKec = [];
var kecamatan = [];
for (let i = 0; i <jmlKec  ; i++) {
    kecamatan[i] = document.getElementById("kecamatan["+i+"]").value;
    dataKec[i] = document.getElementById("dataByKec["+i+"]").value;
    randomColor[i] = "#000000".replace(/0/g,function(){return (~~(Math.random()*16)).toString(16);});
    randomColorHover[i] = "#000000".replace(/0/g,function(){return (~~(Math.random()*16)).toString(16);});

    if (dataKec[i]==0){
        dataKec[i]= 0;
    }
    console.log(dataKec);
}
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: kecamatan,
    datasets: [{
      data: dataKec,
        // sliceVisibilityThreshold:0,
      backgroundColor: randomColor,
      hoverBackgroundColor: randomColorHover,
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true,
    },
    cutoutPercentage: 80,
  },
});
