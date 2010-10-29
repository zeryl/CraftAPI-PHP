<?

class craftlib {
	
	private $client;
	private $result;
	public $items = array('Air', 'Stone', 'Grass', 'Dirt', 'Cobblestone', 'Wood', 
			   'Sapling', 'Bedrock', 'Water', 'Stationary Water', 'Lava',
			   'Stationary Lava', 'Sand', 'Gravel', 'Gold Ore', 'Iron Ore',
			   'Coal Ore', 'Log', 'Leaves', 'Sponge');
	
	function __construct($url) {
		$this->client = new PrettyXMLRPC($url, new PrettyXMLRPCEpiBackend);
	}
	
	public function getLastResult() {
		return $this->result;
	}
	
	public function getPlayerNames() {
		$return = $this->client->player->getPlayerNames();
		$this->result = $this->client->result;
		return $this->result;
	}
	
	public function broadcastMessage($message) {
		$this->client->player->broadcastMessage($message);
	}
	
	public function getInventory($player) {
		$this->client->player->getInventory($player);
		
		$result = $this->client->result;
		
		foreach($result as $key => $value) {
			$newresult[$key] = $value;
			if(isset($this->items[$value['itemID']]))
				$newresult[$key]['itemName'] = $this->items[$value['itemID']];
		}
		$this->result = $newresult;
		
		return $this->result;
	}
}