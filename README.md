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
##### Các thao tác add và commit
- Thêm file được thay đổi vào index
    - *git add <ten-tap-tin>*
    *git add **
- Tạo commit cho những thay đổi
    - *git commit -m "Ghi chú cho commit"*
- Đẩy code lên repository remote
    - *git push origin master* (có thể thay đổi branch master thành những branch khác)
## Repository
- Tập hợp file và lịch sử của file đó.
- Một repository có thể sống được cả trên local và trên server
- Clone một repository về máy
    - *git clone git@github.com:at-minhdao/git-demo.git*
### Ba trạng thái của một repository:
<img src=http://i.imgur.com/qkmdJSR.png>

Như hình trên ta có thể thấy có 3 điểm cần lưu ý:

- Working dir: đây là nơi thực hiện các thao tác chỉnh sửa với file mã nguồn, nó có thể là sublime text, notepad++,...
- Stagging area: những sự thay đổi của mình với file mã nguồn được lưu lại, gần giống như ta ấn Save trong một file notepad.
- Git directory: nơi lưu trữ mã nguồn của mình (GitHub/ Bitbucket...)
Tương ứng với 3 vị trí này ta có các hành động:
- Add: lưu file thay đổi (mang tính cục bộ) - tương ứng với câu lệnh `git add`
- Commit: Ghi lại trạng thái thay đổi tại máy local (ví dụ như ta có thể ấn Save nhiều lần với file README.md nhưng chỉ khi commit thì trạng thái của lần ấn Save cuối cùng trước đó mới được lưu lại) - tương ứng với câu lệnh `git commit`
- Push: Đẩy những thay đổi từ máy trạm lên server - tương đương lệnh `git push`
- Pull: đồng bộ trạng thái từ server về máy trạm - tương đương lệnh `git pull`
## Work flow
- 3 trạng thái của file
    <ul>
    <li>commited: dữ liệu được lưu giữ an toàn trong cơ sở dữ liệu local</li>
    <li>modified: file bị sửa đổi nhưng chưa có commited nào ở dữ liệu local</li>
    <li>staged: đánh dấu một file bị sửa đổi trong phiên hiện tại sẽ vào snapshot trong commited tiếp theo</li>
    </ul>

## Work flow
- Kiểm tra sự thay đổi của file
    git diff README.md

## Git Ignore
- Khai báo các file hoặc thư mục trong file .gitignore để loại bỏ chúng ra khỏi tracking của git

##Branch
- Các branch được dùng để phát triển những tính năng tách riêng ra từ những branch khác.
- Branch master là branch mặc định khi ta tạo một repository.
- Sử dụng các branch khác trong giai đoạn phát triển và merge lại nhánh master khi một công việc hoàn tất.
##### Các thao tác trên branch
- Tạo một branch mới và chuyển qua branch mới đó
	- *git checkout -b new_branch*
- Trở lại nhánh master
	- *git checkout master*
- Xóa một branch 
	- *git branch -d new_branch*
- Đẩy nhánh lên repository
	- *git push origin new_branch* 