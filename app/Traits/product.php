<?php
//app/Traits/product.php
// 🔹 Trait لإدارة المخزون
trait stockTrait{
private int $stock = 0;

    public function addStock(int $quantity): void {
        $this->stock += $quantity;
        echo "[STOCK]: Added {$quantity} items. Current stock: {$this->stock}" . PHP_EOL;
    }
    public function removeStock(int $quantity): void {
        if ($quantity > $this->stock) {
            echo "[STOCK]: Not enough stock!" . PHP_EOL;
            return;
        }
        $this->stock -= $quantity;
        echo "[STOCK]: Removed {$quantity} items. Current stock: {$this->stock}" . PHP_EOL;
    }
    public function getStock(): int {
        return $this->stock;
    }
}
// 🔹 Trait لإدارة الخصومات
trait DiscountTrait{
    public function applyDiscount(float $price, float $discountPercentage): float {
        return $price - ($price * ($discountPercentage / 100));
    }
}

// 🔹 Trait لتسجيل الأنشطة
trait LoggerAction {
    public function logAction(string $message): void {
        echo "[LOG]: {$message}" . PHP_EOL;
    }
}
// 🔹 الفئة الأساسية (مجردة)
abstract class Product {
protected string $name;
protected float $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function calculateFinalPrice(): float;

    public function getProductDetails(): string {
        return "Product: {$this->name}, Price: $" . $this->calculateFinalPrice();
    }
}

// 🔹 فئة المنتج العادي (يستخدم StockTrait و DiscountTrait)
class RegularProducts extends Product{
    use StockTrait, DiscountTrait;

    public function calculateFinalPrice(): float {
        return $this->price;
    }
}
// 🔹 فئة المنتج الرقمي (يستخدم DiscountTrait فقط)
class DigitalProducts extends Product{
    use DiscountTrait;

    public function calculateFinalPrice(): float {
        return $this->applyDiscount($this->price, 10); // خصم افتراضي 10%
    }
}
// 🔹 فئة المنتج الفاخر (يستخدم جميع الـ Traits)
class LuxuryProducts extends Product{
    use StockTrait, DiscountTrait, LoggerAction;

private float $luxuryTax;

    public function __construct(string $name, float $price, float $luxuryTax) {
        parent::__construct($name, $price);
        $this->luxuryTax = $luxuryTax;
    }

    public function calculateFinalPrice(): float {
        $discountedPrice = $this->applyDiscount($this->price, 5); // خصم 5%
        return $discountedPrice + $this->luxuryTax; // إضافة الضريبة الفاخرة
    }
}

// ✅ تجربة الكود

$regular = new RegularProducts("Laptop", 1000);
$regular->addStock(50);
echo $regular->getProductDetails() . PHP_EOL;
echo "After Discount: $" . $regular->applyDiscount(1000, 15) . PHP_EOL; // خصم 15%
$regular->removeStock(5);

echo "------------------------" . PHP_EOL;

$digital = new DigitalProducts("E-Book", 200);
echo $digital->getProductDetails() . PHP_EOL;

echo "------------------------" . PHP_EOL;

$luxury = new LuxuryProducts("Rolex Watch", 5000, 500);
$luxury->addStock(10);
echo $luxury->getProductDetails() . PHP_EOL;
$luxury->logAction("Luxury product sold.");
$luxury->removeStock(2);