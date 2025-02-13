import { useState } from 'react';

const TradeForm = () => {
  const [stockData, setStockData] = useState([]);
  const [formData, setFormData] = useState({
    id: '',
    name: '',
  });

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const submitStockTransaction = async (e) => {
    e.preventDefault();
    try {
      const res = await fetch('http://127.0.0.1:8000/api/trade', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json',
        },
        body: JSON.stringify(formData),
      });
    } catch (e) {
      console.error(e);
    }
  };

  // TODO: When we serach for the name
  // this will be a seperate call to find the stock and get the data
  // then taht is returned here and stored somewere in sate and we pass that to submitStockTranscation

  return (
    <form onSubmit={submitStockTransaction}>
      <div className="mb-2">
        <label htmlFor="">Stock Name</label>
        <input
          type="text"
          name="name"
          placeholder="Name"
          value={formData.name}
          onChange={handleInputChange}
        />
      </div>
      <button type="submit">Submit</button>
    </form>
  );
};

export default TradeForm;
