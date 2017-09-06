<?php

	class CarClass 
	{
		private $color;
		private $gear;
		private $brand;
		private $model;
		private $move = false;

		public function __construct ($brand, $model, $color)
		{
			$this->brand = $brand;
			$this->model = $model;
			$this->color = $color;
		}

		public function start ()
		{
			$this->move = true;
			echo '<p>Поехали</p>';
		}

		public function stop ()
		{
			$this->move = false;
			echo '<p>Остановились</p>';
		}

	}

	$carBMV = new CarClass('BMW', 'Z4', 'white');
	$carAudi = new CarClass('Audi', 'A5', 'black');

	$carAudi->start();
	$carAudi->stop();

	class TVClass 
	{
		private $type;
		private $brand;
		private $model;
		private $onOff = false;
		private $channel;

		public function __construct ($brand, $model, $type)
		{
			$this->brand = $brand;
			$this->model = $model;
			$this->type = $type;
		}

		public function on ()
		{
			$this->onOff = true;
			echo '<p>Включен</p>';
		}

		public function off ()
		{
			$this->onOff = false;
			$this->channel = null;
			echo '<p>Выключен</p>';
		}

		public function changeChannel ($channel) {
		 	
			if ($this->onOff) {
				$this->channel = $channel;
				echo "<p>Канал: $this->channel</p>";
			}
		}

	}

	$tvSony = new TVClass('Sony', 'trinetron', 'lcd');
	$tvSamsung = new TVClass('Samsung', 'PDP F4000', 'plasma');

	$tvSony->on();
	$tvSony->changeChannel(5);
	$tvSony->off();

	class BallpointPenClass
	{
		private $color;
		private $material;

		public function __construct ($color, $material)
		{
			$this->color = $color;
			$this->material = $material;
		}

		public function changeColor ($color)
		{
			$this->color = $color;
			echo "<p>Стержень заменен на $this->color цвет</p>";
		}

	}

	$steelPen = new BallpointPenClass('blue', 'steel');
	$plasticPen = new BallpointPenClass('black', 'plastic');

	$plasticPen->changeColor('red');

	class DuckClass
	{
		private $breed;
		private $state = 'спит';
		private $gender;

		public function __construct ($breed, $gender)
		{
			$this->breed = $breed;
			$this->gender = $gender;
		}

		public function changeState ($state)
		{
			$this->state = $state;
			echo "<p>Утка $this->state</p>";
		}

	}

	$duckMandarin = new DuckClass('Mandarin', 'male');
	$duckGrebe = new DuckClass('Grebe', 'female');

	$duckMandarin->changeState('плывет');

	class ProductClass
	{
		private $price;
		private $discount = 0;
		private $name;

		public function __construct ($name, $price, $discount=0)
		{
			$this->name = $name;
			$this->price = $price;
			$this->discount = $discount;
		}

		public function changePrice ($price, $discount=0)
		{
			if ($price) {
				$this->price = $discount ? ($price - $price * $discount / 100) : $price;
				echo "Новая цена: $this->price";
			}
		}
	}

	$productBread = new ProductClass('Bread', 100);
	$productJacket = new ProductClass('Jacket', 1000);

	$productJacket->changePrice(1000, 20);

	class NewsClass
	{
		private $news;
		private $comments;

		public function __construct ($news, $comments)
		{
			$this->news = $news;
			$this->comments = $comments;
		}

		public function getNews ()
		{
			return $this->news;
		}

		public function getComments ()
		{
			return $this->comments;
		}

	}

	class CommentsClass
	{
		private $comments = [];

		public function __construct ($comment)
		{
			$this->comments = $comment;
		}

		public function getComments ()
		{
			return $this->comments;
		}
	}

	$news = 
		[
			new NewsClass('Новость1', new CommentsClass(['Комментарий1', 'Комментарий2'])),
			new NewsClass('Новость2', new CommentsClass(['Комментарий3', 'Комментарий4'])),
			new NewsClass('Новость3', new CommentsClass(['Комментарий5', 'Комментарий6']))
		]
?>

<html>
	<head>
	<title>Классы</title>
	<style type="text/css">
		.second {
			margin-left: 20px;
		}
	</style>
	</head>
	<body>
		<p>
			<ou>
				<?php foreach ($news as $obj) : ?>
					<li><?=$obj->getNews()?>
						<ou>
							<?php foreach ($obj->getComments()->getComments() as $comment) : ?>
								<li class='second'><?=$comment?></li>
							<?php endforeach; ?>
						</ou>
					</li>	
				<?php endforeach; ?>
			</ou>
		</p>
	</body>
</html>