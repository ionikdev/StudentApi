type TableData = {
    id: number;
    name: string;
    course: string;
    phone: string;
    email: string;
};
type TableDataProps = {
    data: TableData[];
};

const TableData = ({ data }: TableDataProps) => {
    return <div className="flex justify-center"> </div>;
};

export default TableData;
