package ru.itapelsin.controllers;

import com.google.gson.Gson;
import lombok.Data;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import ru.itapelsin.persistence.Category;
import ru.itapelsin.repositories.CategoryRepository;
import ru.itapelsin.repositories.OfferRepository;

import java.util.HashSet;
import java.util.List;
import java.util.Set;

@RestController
@RequestMapping(path = "api")
public class RestApiController {

    @Autowired
    private Gson gson;

    @Autowired
    private OfferRepository offerRepository;

    @Autowired
    private CategoryRepository categoryRepository;

    @RequestMapping(path = "/offers", method = RequestMethod.POST)
    public String getOffers(@RequestBody List<String> categories) {
        Set<Category> categorySet = new HashSet<>();
        for (String category : categories) {
            categoryRepository.findByName(category).ifPresent(categorySet::add);
        }
        return gson.toJson(offerRepository.findByCategory(categorySet));
    }

    @RequestMapping(path = "/categories", method = RequestMethod.GET)
    public String getCategories() {
        return gson.toJson(categoryRepository.findAll());
    }

    @RequestMapping(params = "/addOffer", method = RequestMethod.POST)
    public void addOffer(@RequestBody String requestBody) {

    }

    @Data
    public static class NewOfferRequest {
        String email;
        String password;


    }
}
