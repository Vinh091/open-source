<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE COURSE</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Course List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Course Name</th>
                                <th class="text-center" width="20%">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                            //   trong phần này sẽ truy vấn vào bảng course_tbl để lấy toàn bộ danh sách khóa học
                            // Sắp xếp theo cou_id giảm dần (DESC), tức là khóa học mới nhất sẽ được hiển thị trước.
 
                                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC ");
                                // Kiểm tra xem coi có dữ liệu trong bảng không, nếu có thì thực hiện vòng while để
                                // hiển thị từng khóa học nếu ko thì hiện ko có
                                if($selCourse->rowCount() > 0)
                                {
                                    // Lặp qua từng khóa học bằng fetch(PDO::FETCH_ASSOC), giúp lấy dữ liệu theo từng hàng.
                                    // Mỗi khóa học được hiển thị trong <tr> (table row).
                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4">
                                                <!-- tên khóa học -->
                                                <?php echo $selCourseRow['cou_name']; ?>
                                            </td>
                                            <td class="text-center">
                                             <button type="button" data-toggle="modal" data-target="#updateCourse-<?php echo $selCourseRow['cou_id']; ?>"  class="btn btn-primary btn-sm">Update</button>
                                             <button type="button" id="deleteCourse" data-id='<?php echo $selCourseRow['cou_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Course Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
