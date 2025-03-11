declare context item := doc("student.xml");

let $student := //Student
return
  <Subjects>
    {
      for $subject in $student/Subjects/Subject
      return <subject_name>{ $subject/Name }</subject_name>
    }
  </Subjects>
