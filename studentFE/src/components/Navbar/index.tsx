const index = () => {
    return (
        <nav className=" w-full max-h-fit p-5 bg-white shadow-2xl rounded-md flex justify-between items-center ">
            <div>Student Curd</div>
            <div>
                <ul className=" flex items-center gap-5">
                    <li>Student</li>
                    <li>Records</li>
                    <li>School</li>
                </ul>
            </div>
        </nav>
    );
};

export default index;
