import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import StocksTable from '@/Components/Stocks/StocksTable';
import TradeForm from '@/Components/Trades/TradeForm';

const StocksMainPage = ({ stocks }) => {
  return (
    <AuthenticatedLayout>
      <Head title="Stocks" />
      <main className="px-4 sm:px-6 lg:px-8 py-6">
        <div className="grid grid-cols-3 gap-4">
          {/* Main Box */}
          <div className="col-span-2 bg-white shadow rounded-lg p-6">
            <div className="">FILTER BOX</div>
            <StocksTable stocks={stocks} />
          </div>

          {/* Right Section - Two stacked boxes */}
          <div className="flex flex-col gap-4">
            <div className="bg-white shadow rounded-lg p-4 h-1/2">
              <h3 className="text-2xl font-medium">Trade</h3>
              <TradeForm stocks={stocks} />
            </div>
            <div className="bg-white shadow rounded-lg p-4 h-1/2">
              <h3 className="text-lg font-medium">Bottom Box</h3>
              <p>More content here.</p>
            </div>
          </div>
        </div>
      </main>
    </AuthenticatedLayout>
  );
};

export default StocksMainPage;
