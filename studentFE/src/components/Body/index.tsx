import { useState, useEffect } from "react";
import axios from "axios";

interface Student {
    id: number;
    name: string;
    course: string;
    phone: string;
    email: string;
}

const Body = () => {
    const [students, setStudents] = useState<Student[]>([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/student"
                );
                setStudents(response.data.student);
                setLoading(false);
                console.log(response);
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        };

        fetchData();
    }, []);
    if (loading) {
        return <div>Loading......</div>;
    }

    const studentDetails = students.map((item: Student) => {
        return (
            <tr key={item.id}>
                <td className="border p-2">{item.id}</td>
                <td className=" border w-[30%]">{item.name}</td>
                <td className="border">{item.course}</td>
                <td className="border">{item.phone}</td>
                <td className="border"> {item.email}</td>
                <td className=" flex items-center justify-around text-white m-2">
                    <button className="bg-blue-700 p-2 rounded-md">Edit</button>
                    <button className=" bg-red-700 p-2 rounded-md">
                        Delete
                    </button>
                </td>
            </tr>
        );
    });

    return (
        <div className="mt-[100px]">
            <div className=" text-center">
                <button className="bg-blue-800  rounded-lg p-3 border ring-2 ring-slate-700">
                    Add Student
                </button>
            </div>
            <div className="flex justify-center">
                <table className=" table-auto border w-[70%]">
                    <thead className="p-2 border ">
                        <tr className=" border text-center ">
                            <th className="border">ID</th>
                            <th className="border">Name</th>
                            <th className="border">Course</th>
                            <th className="border">Phone</th>
                            <th className="border">Email</th>
                            <th className="border">Actions</th>
                        </tr>
                    </thead>
                    <tbody className=" border  text-center">
                        {studentDetails}
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default Body;
