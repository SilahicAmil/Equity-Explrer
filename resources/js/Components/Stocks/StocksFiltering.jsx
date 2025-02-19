const StocksFiltering = ({ search, setSearch }) => {
  return (
    <>
      <div className="flex gap-24 mb-4 w-full h-14">
        <div>
          <h1 className="text-2xl font-medium">Stocks</h1>
          <p className="text-sm font-medium">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
          </p>
        </div>
        <div className="flex gap-6 h-12">
          <input
            type="text"
            placeholder="Search stocks..."
            value={search}
            onChange={(e) => setSearch(e.target.value)}
            className="w-full px-4 py-2 border rounded-lg"
          />
          <button className="bg-red-500 p-4 text-white font-bold rounded-md w-32 flex justify-center items-center">
            Search
          </button>
        </div>
      </div>
    </>
  );
};

export default StocksFiltering;
