import StockTableRow from './StockTableRow';

const StocksTable = ({ stocks, setSelectedStock }) => {
  return (
    <table className="table-auto w-full h-fit">
      <thead>
        <tr>
          <th>#</th>
          <th>Stock Name</th>
          <th>Current Price</th>
          <th>Stock Sector</th>
          <th>Chart</th>
        </tr>
      </thead>
      <tbody>
        {/* TODO: onClick show Trade Modal */}
        <StockTableRow stockData={stocks} setSelectedStock={setSelectedStock} />
      </tbody>
    </table>
  );
};

export default StocksTable;
