<?php 
    // NCR COUNT
    $ncr_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'NCR'"); 
    $ncr_result = mysqli_fetch_assoc($ncr_query);
    $ncr_total_number_of_cases = $ncr_result['status'];

    // REGION 1 COUNT
    $region1_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 1'"); 
    $region1_result = mysqli_fetch_assoc($region1_query);
    $region1_total_number_of_cases = $region1_result['status'];

    // REGION 2 COUNT
    $region2_query= mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 2'"); 
    $region2_result = mysqli_fetch_assoc($region2_query);
    $region2_total_number_of_cases = $region2_result['status'];

    // REGION 3 COUNT
    $region3_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 3'"); 
    $region3_result = mysqli_fetch_assoc($region3_query);
    $region3_total_number_of_cases = $region3_result['status'];

    // REGION 4 COUNT
    $region4_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 4'"); 
    $region4_result = mysqli_fetch_assoc($region4_query);
    $region4_total_number_of_cases = $region4_result['status'];

    // REGION 5 COUNT
    $region5_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 5'"); 
    $region5_result = mysqli_fetch_assoc($region5_query);
    $region5_total_number_of_cases = $region5_result['status'];

    // REGION 6 COUNT
    $region6_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 6'"); 
    $region6_result = mysqli_fetch_assoc($region6_query);
    $region6_total_number_of_cases = $region6_result['status'];

    // REGION 7 COUNT
    $region7_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 7'"); 
    $region7_result = mysqli_fetch_assoc($region7_query);
    $region7_total_number_of_cases = $region7_result['status'];

    // REGION 8 COUNT
    $region8_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 8'"); 
    $region8_result = mysqli_fetch_assoc($region8_query);
    $region8_total_number_of_cases = $region8_result['status'];

    // REGION 9 COUNT
    $region9_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 9'"); 
    $region9_result = mysqli_fetch_assoc($region9_query);
    $region9_total_number_of_cases = $region9_result['status'];

    // REGION 10 COUNT
    $region10_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 10'"); 
    $region10_result = mysqli_fetch_assoc($region10_query);
    $region10_total_number_of_cases = $region10_result['status'];

    // REGION 11 COUNT
    $region11_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 11'"); 
    $region11_result = mysqli_fetch_assoc($region11_query);
    $region11_total_number_of_cases = $region11_result['status'];

    // REGION 12 COUNT
    $region12_query = mysqli_query($conn, "SELECT COUNT(*) as status FROM `lra_data_tb` WHERE judicial_region = 'REGION 12'"); 
    $region12_result = mysqli_fetch_assoc($region12_query);
    $region12_total_number_of_cases = $region12_result['status'];
            
?>

<script src="../assets/libs/chartjs/chart.umd.js"></script>
<script>
        
        const judicial_regions_bar_chart = document.querySelector("#judicial_regions_bar_chart");
        const jrbc = new Chart(judicial_regions_bar_chart, {
        type: 'bar',
        data: {
            labels: [
                    "NCR", 
                    "REGION 1", 
                    "REGION 2", 
                    "REGION 3", 
                    "REGION 4", 
                    "REGION 5",
                    "REGION 6", 
                    "REGION 7", 
                    "REGION 8", 
                    "REGION 9", 
                    "REGION 10",
                    "REGION 11", 
                    "REGION 12"
                    ],
            datasets: [{
                label: 'TOTAL',
                data: [ 
                    <?php echo $ncr_total_number_of_cases ?>, 
                    <?php echo $region1_total_number_of_cases ?>,
                    <?php echo $region2_total_number_of_cases ?>,
                    <?php echo $region3_total_number_of_cases ?>,
                    <?php echo $region4_total_number_of_cases ?>,
                    <?php echo $region5_total_number_of_cases ?>,
                    <?php echo $region6_total_number_of_cases ?>,
                    <?php echo $region7_total_number_of_cases ?>,
                    <?php echo $region8_total_number_of_cases ?>,
                    <?php echo $region9_total_number_of_cases ?>,
                    <?php echo $region10_total_number_of_cases ?>,
                    <?php echo $region11_total_number_of_cases ?>,
                    <?php echo $region12_total_number_of_cases ?>
                    ],
                    
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
        plugins: {
           legend: false,
            title: {
                display: true,
                text: 'JUDICIAL REGIONS BAR CHART',
                color: '#0636AC',
                font: {
                	size: 20,
                    weight: 700
                }
                }
        }}
        });
</script>