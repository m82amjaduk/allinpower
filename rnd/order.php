<?php
/**
 * Created by PhpStorm.
 * User: amzad
 * Date: 25/03/14
 * Time: 13:54
 */


# -------------------Answer  -------------------

 Class OrderRequestHandler{
   //  function OrderRequestHandler(OrderService=$orderService){ unnessesary function for this script

  // }
  public function handleRequest($_request){

	if($_request['orderid']){

			$order=$this->get($_request['orderid']);
                      $html='<table><tr><td>CustomerId</td><td>OrderId</td><td>Status</td><td>Gross</td><td>Tax</td><td>NetAmount</td></tr>
			<tr><td>'.$order->CustomerId.'</td><td>'.$order->OrderId.'</td><td>'.$order->status.'</td><td>'.$order->GrossAmount.'</td>
			<td>'.$order->TaxAmount.'</td><td>'.$order->NetAmount.'</td></tr>';

			echo $html;

		} else if ($_request['customerid']){
            $i = 0;
			$order=$this->getForCustomer($_request['orderid']);
			$html='<table><tr><td>CustomerId</td><td>OrderId</td><td>Status</td><td>Gross</td><td>Tax</td><td>NetAmount</td></tr>';
			while($i < count($order)){
				$html .='<tr><td>'.$order->CustomerId.'</td><td>'.$order->OrderId.'</td><td>'.$order->Status.'</td><td>'.$order->Gross.'</td>
				<td>'.$order->TaxAmount.'</td><td>'.$order->NetAmount.'</td></tr>';
			}

			$html .='</table>';

			return $html;
		}
	}
}


 Class OrderService extends OrderRequestHandler implements IOrderService, IOrderId {//add here the extend of OrderRequestHandler class and IOrderId int

	public function get($id){

		$result=$this->conn->Execute("Select CustomerId,Orderid,GrossAmount,TaxAmount from orders where orderid=".$id);//perform your query
		$order=new Order(); //need call this function here
		$order->CustomerId=$result['CustomerId'];
		$order->OrderId=$result['Orderid'];//change that with orderid val
		$order->GrossAmount=$result['GrossAmount'];
		$order->TaxAmount=$result['TaxAmount'];
                $order->getNetAmountForOrder($result['GrossAmount'],$result['TaxAmount']);//this mast add here with the correct values
		switch($result['TaxAmount']){//this switch can't used the tax amount mast be a number or else you need a validate for that
			case 'P': $order->status='Provisional';
                        case 'C': $order->status='Confirmed';
                        case 'X': $order->status='Canceled';
                        case 'Y': $order->status='Paid';
		}

		return $order;
	}

        public function getForCustomer($id){
            $results=$this->conn->Execute("Select CustomerId, Orderid, GrossAmount,TaxAmount from orders where customerid=".$id);//perform your query

            $order=new Order();
            $i = 0;
            foreach($results as $result){
                $order->CustomerId=$result['CustomerId'];
                $order->OrderId=$result['Orderid'];//change that with orderid val
                $order->GrossAmount=$result['GrossAmount'];
                $order->TaxAmount=$result['TaxAmount'];
                $order->getNetAmountForOrder($result['GrossAmount'],$result['TaxAmount']); //this mast add here with the correct values
                switch($result['TaxAmount']){//this switch can't used the tax amount mast be a number or else you need a validate for that
                    case 'P': $status='Provisional';
                    case 'C': $status='Confirmed';
                    case 'X': $status='Cancelled';
                    case 'Y': $status='Paid';

                }

                $order->status=$status;

                $orderArray[$i]=$order;
                $i++;

            }

            return $orderArray;
        }
    }


interface IOrderService
{
    //Returns a Single Order for an ID
    public function get($id);
    //Return an arrau of orders for Year
    public function getForCustomer($year);

}
//----- same function cont add in the same interface multiple
interface IOrderId{
//Returns an array of orders for an ID
    public function getForCustomer($id);

}

Class Order {

    public $CustomerId,
        $OrderId,
        $Status,
        $GrossAmount,
        $TaxAmount,   //tax amount is int and in your switch comant you have a string
        $NetAmount;   //Net amount mast be int

    public function getNetAmountForOrder($first_val,$second_val){
        /*[*/ $this->NetAmount=($this->GrossAmount-5);//]-->this will not work
        $this->NetAmount=($first_val-$second_val);//will work something like that
    }
}


$orderService=new OrderService();
//$orderRequestHandler=new OrderRequestHandler();
//$orderRequestHandler->
$orderService->handleRequest($result);