async function fetchApiCall(url, headers = [], options = []) {
    try {
        let res = await fetch(url, {
            method : "GET",
            headers : headers
        });
        return await res.json();
    } catch (error) {
        console.log(error);
    }
};

function chartsForVisitors(data) {
    document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#trafficChart")).setOption({
          tooltip: {
            trigger: 'item'
          },
          legend: {
            top: '2%',
            left: 'center'
          },
          series: [{
            name: 'Visitor From',
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: {
              show: false,
              position: 'center'
            },
            emphasis: {
              label: {
                show: true,
                fontSize: '18',
                fontWeight: 'bold'
              }
            },
            labelLine: {
              show: false
            },
            data: data
          }]
        });
      });
}
