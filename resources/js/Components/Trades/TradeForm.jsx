import { useEffect, useState } from 'react';

const TradeForm = ({ selectedStock }) => {
  const [formData, setFormData] = useState({
    name: '',
    quantity: 0,
    current_price: 0,
    type: '',
  });

  useEffect(() => {
    if (selectedStock) {
      setFormData({
        name: selectedStock.stock_name,
        current_price: selectedStock.current_price,
        type: '',
        quantity: 0,
      });
    }
  }, [selectedStock]);

  async function submitTradeForm(e) {
    e.preventDefault();
    console.log('FORM DATA', formData);
    try {
      const res = await axios.post('/trade', formData, {
        withCredentials: true,
      });
    } catch (e) {
      console.error('Error submitting form:', e.response?.data);
    }
  }

  function handleInputChange(e) {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));
  }

  return (
    <div className="font-mono">
      <form onSubmit={submitTradeForm}>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Stock Name
          </label>
          <input
            type="text"
            className="text-sm w-1/2 "
            placeholder={
              selectedStock?.stock_name
                ? selectedStock?.stock_name
                : 'Select stock from left'
            }
            value={formData.stock_name}
            onChange={handleInputChange}
          />
        </div>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Stock Price
          </label>
          <input
            type="text"
            className="text-sm w-1/2 "
            placeholder={
              selectedStock?.current_price
                ? selectedStock?.current_price
                : '0.00'
            }
            value={formData.current_price}
            onChange={handleInputChange}
          />
        </div>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Quantity
          </label>
          <input
            type="text"
            className="text-sm w-1/2 "
            placeholder="0"
            onChange={handleInputChange}
          />
        </div>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Transaction Type
          </label>
          <div className="flex gap-4 items-center">
            <label>Buy</label>
            <input
              type="radio"
              name="transaction_type"
              value="buy"
              onChange={handleInputChange}
            />
            <label>Sell</label>
            <input
              type="radio"
              name="transaction_type"
              value="sell"
              onChange={handleInputChange}
            />
          </div>
        </div>
        <div className="flex items-center w-full justify-center">
          <button className="bg-green-500 p-4 rounded-xl" type="submit">
            Submit
          </button>
        </div>
      </form>
    </div>
  );
};

export default TradeForm;
