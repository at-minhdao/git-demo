## Git là gì
- `Git` là một phần mềm dùng để quản lý phiên bản của mã nguồn
    <ul>
    <li>Lưu giữ những thay đổi trong quá trình làm việc</li>
    <li>Môi trường để nhiều người cùng làm việc với nhau</li>
    <li>Biết ai làm gì, dòng nào, khi nào</li>
    <li>Revert lại lịch sử code</li>
    </ul>
## Snapshot
- Lưu dữ liệu và trạng thái của tất cả các file
- Nếu file không thay đổi thì chỉ link tới file cũ
## Commit
- Là một hành động tạo ra snapshot
- Khi chúng ta hoàn thành xong một công việc thì nên tạo ra một commit mới để bảo toàn dữ liệu.
- Thông qua commit chúng ta có thể revert hay rollback lại lịch sử dữ liệu.
## Repository
- Tập hợp file và lịch sử của file đó.
- Một repository có thể sống được cả trên local và trên server
## Work flow
- 3 trạng thái của file
<ul>
<li>commited: dữ liệu được lưu giữ an toàn trong cơ sở dữ liệu local</li>
<li>modified: file bị sửa đổi nhưng chưa có commited nào ở dữ liệu local</li>
<li>staged: đánh dấu một file bị sửa đổi trong phiên hiện tại sẽ vào snapshot trong commited tiếp theo</li>
</ul>
