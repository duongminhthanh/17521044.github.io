$("document").ready(function(){
    
    var phonechart = document.getElementById("phonechart").getContext("2d");
    
    var top5phonesChart = new Chart(phonechart,{
        type:'bar',
        data:{
            labels:dt_ten/*['Samsung Galaxy J7 Pro','Iphone X','Oppo A3 S','Samsung Galaxy S9','Iphone6Plus']*/,
            datasets:[{
                    label:'Số lượng đã bán',
                    data:dt_sl/*[
                        180,
                        510,
                        250,
                        400,
                        450
                    ]*/,
                    backgroundColor:'#00bfbf'
            }]
        }/*,
        options:{
            title:{
                display: true,
                text:'Top điện thoại bán chạy nhất',
                fontSize: 30
            }
        }*/
    });
    
    var accchart = document.getElementById("accchart").getContext("2d");
    
    var top5accsChart = new Chart(accchart,{
        type:'horizontalBar',
        data:{
            labels:pk_ten/*['Samsung Galaxy J7 Pro','Iphone X','Oppo A3 S','Samsung Galaxy S9','Iphone6Plus']*/,
            datasets:[{
                    label:'Số lượng đã bán',
                    data:pk_sl/*[
                        180,
                        510,
                        250,
                        400,
                        450
                    ]*/,
                    backgroundColor:'#00bfbf'
            }]
        }/*,
        options:{
            title:{
                display: true,
                text:'Top điện thoại bán chạy nhất',
                fontSize: 30
            }
        }*/
    });
    
});