declare context item := doc("student.xml");

let $student := //Student
return
  <StudentInfo>
    <Name>{ $student/Name }</Name>
    <Age>{ $student/Age }</Age>
  </StudentInfo>
