
<form method="post" action="?c=rezervaciePriestor&a=store">
    <?php /** @var \App\Models\RezervaciaPriestor $data */
    if ($data->getId()) { ?>
        <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
    <?php } ?>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Den</label>
        <select class="form-control" id="exampleFormControlSelect1" name="den">

            <option value="Pondelok" >Pondelok</option>
            <option>Utorok</option>
            <option>Streda</option>
            <option>Stvrtok</option>
            <option>Piatok</option>
        </select>
        <label for="exampleFormControlSelect2">Zaciatok</label>
        <select class="form-control" id="exampleFormControlSelect2" name="zaciatok">
            <option value="8">8:00</option>
            <option value="9">9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
        </select>
        <label for="exampleFormControlSelect3">Koniec</label>
        <select class="form-control" id="exampleFormControlSelect3" name="koniec">
            <option value="9">9:00</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
        </select>
        <input type="submit" name="Odoslat">
    </div>
</form>